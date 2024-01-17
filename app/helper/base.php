<?php
 if(!function_exists("create_title_website")){
    function create_title_website($title){
       return  isset($title)? config("app.name")." | ".$title : config("app.name");
    }
 };

 if(!function_exists("concat_chain_on_condition")){
    function concat_chain_on_condition($chain1,$chain2,$condition){
        $response=$chain1;
        if($condition){
            $response.=$chain2;
        }
       return  $response;
    }
 };
 if(!function_exists("route_Is")){
    function route_Is($tab){
        $response=false;
        foreach($tab as $route){
            $response=$response?true:Route::is($route);
        }
       return  $response;
    }
 };

 if(!function_exists("format_phone_number")){
    function format_phone_number( $data){
        if(  preg_match( '/^\+(\d{3})(\d{2})(\d{3})(\d{2})(\d{2})$/', $data,  $matches ) )
        {
            $result = '+'.$matches[1] . '-' .$matches[2] . '-' . $matches[3]. '-' . $matches[4]. '-' . $matches[5];
            return $result;
        }else{
            return "hum";
        }
    }
 };

 function is_current_profil_page($val){
    if(isset($current)){
        return $current==$val?'active':'';
    }else{
        return $val=='dashboard'?'active':'';
    }
}