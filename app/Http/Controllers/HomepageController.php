<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\category;
use App\Models\contact;
use App\Models\homepage;
use App\Models\post;
use App\Models\product;
use App\Models\videogallery;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Config;


class HomepageController extends Controller
{


    public function cloudflareImage()
    {

        $token = "DhLGwokORgoCqPQBp854PD4ILsNlaVGDi7FhqR1e";


    }


    static function webps($image, $size)
    {


        // dd(storage_path('app/public/images/userfiles/' . $image));


        $filename = pathinfo($image, PATHINFO_FILENAME);
        $extension = pathinfo($image, PATHINFO_EXTENSION);

        $image = $filename . ".webp";

        if (!File::exists(storage_path('app/public/images/webp_l/' . $filename . ".webp"))) {

            $image2 = $filename . "." . $extension;

            $imageResize = Image::make(storage_path('app/public/images/userfiles/' . $image2))->encode('webp', 70);
            $imageResize->resize(800, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $destinationPath = storage_path('app/public/images/webp_l/');
            $imageResize->save($destinationPath . $image);

            $imageResize = Image::make(storage_path('app/public/images/userfiles/' . $image2))->encode('webp', 70);
            $imageResize->resize(350, 175, function ($constraint) {
                $constraint->aspectRatio();
            });
            $destinationPath = storage_path('app/public/images/webp_m/');
            $imageResize->save($destinationPath . $image);

            $imageResize = Image::make(storage_path('app/public/images/userfiles/' . $image2))->encode('webp', 70);
            $imageResize->resize(100, 50, function ($constraint) {
                $constraint->aspectRatio();
            });
            $destinationPath = storage_path('app/public/images/webp_s/');
            $imageResize->save($destinationPath . $image);


        }

        return "/storage/images/webp_" . $size . "/" . $image;
        //'?v='.rand(0,99999);

    }

    public function index()
    {
        $cData = new \ArrayObject();

        $banners = banner::orderBy('place')->orderBy('sort')->get();
        $cData->posts = post::where('category_id', 63)->get();
        $cData->tedavilerimiz = category::where('id', 64)->orwhere('id', 65)->orwhere('id', 66)->get();

        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;

        }

        $array = ['89', '70', '77'];
        foreach ($array as $key => $val) {
            $cData->sss[$val] = post::where("category_id", 86)->where('category2_id', $val)->first();
        }

        return view('home.index', ['cData' => $cData]);
    }

    public function contact()
    {
        $cData = new \ArrayObject();
        $cData->contact = contact::first();
        return view('home.contact', ['cData' => $cData]);
    }

    public function sitemap()
    {
        $cData = new \ArrayObject();
        $cData->data = post::where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->get();
        return view('home.sitemap', ['cData' => $cData]);
    }


    public function marken(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->category = category::where("parent_id", 43)->get();
        return view('home.marken', ['cData' => $cData]);


    }

    public function markenpage(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->posts = post::where("brand", $request->id)->orderByDesc('id')->get();
        return view('home.category', ['cData' => $cData]);


    }


    public function category(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->orderByDesc('id')->get();
        $cData->banner = post::where("category_id", 90)->first();
        $cData->sss = post::where("category_id", 86)->where("category2_id", $request->id)->get();

        if (count($cData->posts) == 1) {
            $cData->posts = $cData->posts->first();
            return view('home.post', ['cData' => $cData]);
        } elseif (count($cData->posts) > 1) return view('home.category', ['cData' => $cData]);
    }


    public function categories(Request $request)
    {
        $cData = new \ArrayObject();
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->get();
        if (count($cData->posts) == 1) {
            $cData->posts = $cData->posts->first();
            if ($this->ismobile()) return view('home.mobil-post', ['cData' => $cData]);

            return view('home.post', ['cData' => $cData]);
        } elseif (count($cData->posts) > 1) {
            if ($this->ismobile()) return view('home.mobil-category', ['cData' => $cData]);
            return view('home.category', ['cData' => $cData]);
        }
    }

    public function postamp(Request $request)
    {

        $request->amp = 1;
        return $this->post($request);
    }


    public function post(Request $request)
    {

        $cData = new \ArrayObject();


        $cData->posts = post::where("id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->first();
        $cData->preview = post::where("id", "<", $request->id)->orderByDesc("id")->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->first();
        $cData->next = post::where("id", ">", $request->id)->orderBy("id")->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->first();
        $cData->brands = post::where("brand", $cData->posts->brand)->where("id", "!=", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->limit(20)->get();

        $cData->posts->increment('hit');


        //dd($request);

        if ($request->amp == 1) return view('home.amp-post', ['cData' => $cData, "link" => Config::get("solaris.site.url") . str_slug($cData->posts->title, "-") . "/" . $cData->posts->id . ".html"]);


        if ($this->ismobile()) return view('home.mobil-post', ['cData' => $cData, "amp" => Config::get("solaris.site.url") . str_slug($cData->posts->title, "-") . "/" . $cData->posts->id . "/amp"]);

        return view('home.post', ['cData' => $cData, "amp" => Config::get("solaris.site.url") . str_slug($cData->posts->title, "-") . "/" . $cData->posts->id . "/amp"]);
    }


    static function ismobile()
    {

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))

            return true;

        else return false;


    }


}
