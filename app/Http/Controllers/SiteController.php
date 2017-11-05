<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;
use App\Site;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class SiteController extends Controller
{
    private $url;
    private $password;

    function __construct()
    {
        $this->url      = $this->getUrl();
        $this->password = "060899";
    }

    public function index() {
        $sites = Site::paginate(5);

        $dir     = storage_path('zips/themes');
        $themes  = array_diff(scandir($dir), ['..', '.']);
        $plugins = Plugin::all();

        return view('sites.index')
            ->with('sites', $sites)
            ->with('themes', $themes)
            ->with('plugins', $plugins);
    }

    public function create() {
        return view('sites.create');
    }

    public function store(Request $request) {
        //
        $input = $request->all();

        //
        $slug                    = str_slug($input['name'], '_');
        $input['slug']           = $slug;
        $input['local_url']      = url($slug);
        $input['mysql_password'] = $this->password;

        //
        $site = Site::create($input);

        //
        flash('Site criado!')->success();

        //
        return redirect(route('sites.index'));
    }

    public function start($id) {
        $site = Site::find($id);

        $slug           = $site->slug;
        $password       = $site->mysql_password;
        $dir            = storage_path('zips');
        $url            = $this->url.$slug;
        $wordpress_path = public_path($slug);
        $sql            = storage_path('zips/wordpress.sql');

        $this->executeDB($slug, $url, 'http://localhost:8000/criando_um_site', $dir, 'wordpress.zip', $password, $sql, $wordpress_path, 'wordpress');

        return redirect(route('sites.index'));
    }

    public function stop($id) {
        $site = Site::find($id);

        $password         = $this->password;
        $slug             = $site->slug;
        $wordpress_path   = public_path($slug);

        $SQL_DROP = "drop database $slug;";
        shell_exec("mysql -u root -p$password -e \"$SQL_DROP\"");

        if ( \File::deleteDirectory($wordpress_path) ) {
            flash('Site parado!')->success();

            return redirect(route('sites.index'));
        }

        flash("Não apagou o site")->error();

        return redirect(url('/sites'));
    }

    public function theme($id, $theme) {
        $site = Site::find($id);

        $site_dir = public_path($site->slug);
        $themes_dir = storage_path('zips/themes/');

        shell_exec("cd $themes_dir && cp $theme $site_dir/wp-content/themes && cd $site_dir/wp-content/themes && unzip $theme && rm $theme");

        flash("Tema instalado!")->success();

        return redirect(url('/sites'));
    }

    public function plugin($id, $plugin) {
        $site = Site::find($id);
        $plugin = Plugin::find($plugin);

        $site_public_dir = public_path($site->slug);
        $plugins_dir     = $site_public_dir.'/wp-content/plugins';

        $plugin_name = str_replace(' ', '-', $plugin->name).'.zip';

        shell_exec("cd $plugins_dir && wget -O $plugin_name $plugin->url && unzip $plugin_name && rm $plugin_name");

        flash("Plugin instalado!")->success();

        return redirect(url('sites'));
    }

    public function destroy($id) {
        $site = Site::find($id);

        if (empty($site)) {
            flash('Erro')->error();

            return redirect(route('sites.index'));
        }

        $site->delete($id);

        flash('Site deletado!')->success();

        return redirect(route('sites.index'));
    }

    public function phrases($slug, $dir, $wordpress_path) {
        $password = $this->password;

        $FRASE1 = str_random(32);
        $FRASE2 = str_random(32);
        $FRASE3 = str_random(32);
        $FRASE4 = str_random(32);
        $FRASE5 = str_random(32);
        $FRASE6 = str_random(32);
        $FRASE7 = str_random(32);
        $FRASE8 = str_random(32);

        $output = shell_exec("sed -e \"s;%projeto%;$slug;g\" -e \"s;%password%;$password;g\" -e \"s;%frase1%;$FRASE1;g\" -e \"s;%frase2%;$FRASE2;g\" -e \"s;%frase3%;$FRASE3;g\" -e \"s;%frase4%;$FRASE4;g\" -e \"s;%frase5%;$FRASE5;g\" -e \"s;%frase6%;$FRASE6;g\" -e \"s;%frase7%;$FRASE7;g\" -e \"s;%frase8%;$FRASE8;g\" $dir/wp_config_template.txt > $wordpress_path/wp-config.php");
    }

    public function addTheme(Request $request) {
        $file = Input::file('theme');

        $destinationPath = storage_path('zips/themes');
        $filename = explode('.', $request->file('theme')->getClientOriginalName())[0].'.zip';

        if ( $file->move($destinationPath, $filename) ) {
            flash('Tema adicionado!')->success();
        } else {
            flash('Ocorreu um erro com o tema')->error();
        }

        return redirect(url('sites'));
    }

    public function executeDB($slug, $url, $prevUrl, $dir, $zip, $password, $sql, $wordpress_path, $second) {
        $passwordDB = $this->password;

        $SQL_CREATE = "create database $slug; GRANT ALL PRIVILEGES ON $slug.* TO $slug@localhost IDENTIFIED BY '$password'";

        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_CREATE\"");

        if ( !is_null( $sql ) ) {
            $output = shell_exec("mysql -u root -p$passwordDB $slug < $sql");
        }

        $SQL_UPDATE_DB1 = "USE $slug; UPDATE wp_options SET option_value = replace(option_value, '$prevUrl', '$url') WHERE option_name = 'home' OR option_name = 'siteurl';";
        $SQL_UPDATE_DB2 = "USE $slug; UPDATE wp_posts SET guid = replace(guid, '$prevUrl', '$url');";
        $SQL_UPDATE_DB3 = "USE $slug; UPDATE wp_posts SET post_content = replace(post_content, '$prevUrl', '$url');";
        $SQL_UPDATE_DB4 = "USE $slug; UPDATE wp_postmeta SET meta_value = replace(meta_value,'$prevUrl','$url');";
        /*$SQL_UPDATE_DB5 = "USE $slug; UPDATE wp_revslider_slides SET params = replace(params, '$prevUrl', 'http://sites.aioria.com.br/$slug');";
        $SQL_UPDATE_DB6 = "USE $slug; UPDATE wp_revslider_slides SET params = replace(params, 'clientes.aioria', 'sites.aioria');";*/

        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB1\"");
        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB2\"");
        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB3\"");
        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB4\"");
        /*$output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB5\"");
        $output = shell_exec("mysql -u root -p$passwordDB -e \"$SQL_UPDATE_DB6\"");*/

        $output = shell_exec("unzip $dir/$zip -d $dir > /dev/null 2>&1");

        flash('Instancia Wordpress no ar!')->success();

        if(\File::moveDirectory("$dir/$second", $wordpress_path))
            $this->phrases($slug, $dir, $wordpress_path);
        else
            flash("Ocorreu um erro!")->error();
    }

    public function getUrl() {
        return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/";
    }
}
