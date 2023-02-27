<?php
use App\Models\Setting;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!function_exists('blogInfo')){
    function blogInfo(){
        return Setting::find(1);
    }
}

/*
    Date format eg january 12, 2024
*/
if(!function_exists('date_formatter')){
    function date_formatter($date){
        return Carbon::createFromFormat('Y-m-d H:i:s',$date)->isoFormat('LL');
    }
}

/*
    strip words
*/
if(!function_exists('words')){
    function words($value,$words = 15, $end="..."){
        return Str::words(strip_tags($value),$words,$end);
    }
}

/*
    check if user is online/has internet connection
*/
if(!function_exists('isOnline')){
    function isOnline($site = "https://youtube.com/"){
        if(@fopen($site,'r')){
            return true;
        }else{
            return false;
        }
    }
}

/*
*Read article length
*/

if(!function_exists('readDuration')){
    function readDuration(...$text){
        Str::macro('timeCounter',function($text){
            $totalWords = str_word_count(implode(" ",$text));
            $minutesToRead = round($totalWords/200);
            return (int)max(1,$minutesToRead);
        });

        return Str::timeCounter($text);
    }
}

/*
 * Display home latest post
*/

if(!function_exists('single_latest_post')){
    function single_latest_post(){
        return Post::with('author')
                    ->with('subcategory')
                    ->limit(1)
                    ->orderBy('created_at','desc')
                    ->first();
    }
}

/**
 * display the latest 6 posts
 */

 if(!function_exists('latest_home_6posts')){
    function latest_home_6posts(){
        return Post::with('author')
                    ->with('subcategory')
                    ->skip(1)
                    ->limit(6)
                    ->orderBy('created_at','desc')
                    ->get();
    }
 }

/**
 * random recommeded posts
 */
if(!function_exists('recommended_posts')){
    function recommended_posts(){
        return Post::with('author')
                    ->with('subcategory')
                    ->limit(4)
                    ->inRandomOrder()
                    ->get();
    }
}

/**
 * categories with number of posts
 */
if(!function_exists('categories')){
    function categories(){
        return SubCategory::whereHas('posts')
                        ->with('posts')
                        ->orderBy('subcategory_name','asc')
                        ->get();

    }
}

/**
 * latest post for the side bar
 */
if(!function_exists('latest_sidebar_posts')){
    function latest_sidebar_posts($except = null, $limit = 4){
        return Post::where('id','!=',$except)
                    ->limit($limit)
                    ->orderBy('created_at','desc')
                    ->get();
    }
}

/**
 * function that will help us send emails using PHPMailer
 */

if(!function_exists('sendMail')){
    function sendMail($mailConfig){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = env('EMAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('EMAIL_USERNAME');
        $mail->Password = env('EMAIL_PASSWORD');
        $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
        $mail->Port = env('EMAIL_PORT');
        $mail->setFrom($mailConfig['mail_from_email'],$mailConfig['mail_from_name']);
        $mail->addAddress($mailConfig['mail_recipient_email'],$mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body = $mailConfig['mail_body'];

        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }

/**
 * all tags
 */
if(!function_exists('all_tags')){
    function all_tags(){
        return Post::where('post_tags','!=',null)->distinct()->pluck('post_tags')->join(',');
    }
}
}
?>
