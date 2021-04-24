<?php
function getRoute($request)
{
    $route = basename($_SERVER['REQUEST_URI']); 
    $route = ltrim(strtok($route, '?'), '/');
    return $route;
}

function path($path="")
{
    return APP_BASE_PATH.$path;
}

function getAppConfig($key)
{
    $config = include(path("/app_config.php"));
    return $config[$key];
}

function loadAsset($fileName,$uploads=false)
{

    if($uploads)
    {
        if(file_exists(path().$fileName))
        {
            $baseUrl = getAppConfig('base-url');
            $file = $baseUrl.$fileName;
            return $file;
        }

    }
    
    if(file_exists(path("/app/assets/").$fileName))
	{
        $baseUrl = getAppConfig('base-url');
        $file = $baseUrl. 'app/assets/' . $fileName;
		return $file;
	}else{
        return "";
    }
}

function loadTemplate($templateFileName, $variables = []) {
    extract($variables);

    $baseUrl = getAppConfig('base-url');

    ob_start();
    include  path('/app/views/').$templateFileName;

    return ob_get_clean();
}

function sanitizeString ($string){
    $string = htmlspecialchars($string);
    return $string;
}

function l($string)
{
    return $string;
}

function countMagnitude($num)
{
    if($num < 1000)
    {
        return [
            "num" => $num ,
            "mag"=>""
        ];
    }else
    {
        if($num < 1000000)
        {
            return [
                "num" => floor($num/1000) ,
                "mag"=>"k"
            ];
        }else{
            return [
                "num" => floor($num/1000000) ,
                "mag"=>"m"
            ];
        }
    }

}

function howOld($created_at)
{
    $now = time();
    $dif = $now - $created_at;
    if($dif < 60)
    {
        $age['num'] = $dif;
        $age['mag'] = 's';
    }else
    {
        $dif = $dif/60;
        if($dif < 60)
        {
            $age['num'] = $dif;
            $age['mag'] = 'm';
        }else{
            $dif = $dif/60;
            if($dif<24)
            {
                $age['num'] = $dif;
                $age['mag'] = 'h';
            }else{
                $dif = $dif/24;
                if($dif<30) // assume month is 30 days
                {
                    $age['num'] = $dif;
                    $age['mag'] = 'd';
                }else{
                    $dif = $dif/12; 
                    if($dif<12)
                    {
                        $age['num'] = $dif;
                        $age['mag'] = 'm';
                    }else{
                        $age['num'] = $dif;
                        $age['mag'] = 'y';
                    }
                }
            }
        }
    }
    $age['num'] = floor($age['num']);
    return $age;
}

  
function dump_to_file($things) //debuging
{ 
  
    if(file_exists("debug!.txt"))
    {
        file_put_contents("debug!.txt",
        date("H:i:s")."->".print_r($things,true)."\n",FILE_APPEND | LOCK_EX);
    }
    
}