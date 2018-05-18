<?php

if(!function_exists('realTitleCase')){
    function realTitleCase($str){
        // These words will not be capitalized
        $smallwords = [
            'of','a','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with'
        ];
        // Trim whitespace off front and end
        $str = trim($str);
        // Convert any whitespace to single underscores
        $str = preg_replace('/[\s]+/', '_', $str);
        // Convert CamelCase to snake_case
        $str = preg_replace('/[A-Z]/', '_$0', $str);
        // Convert everything to lower
        $str = strtolower($str);
        // Get an array of the words
        $words = explode('_', $str);
        // Iterate through words
        foreach ($words as $key => $word)
        {
            // If this word is the first, or it's not one of our small words, capitalize it with ucwords
            if ($key == 0 or !in_array($word, $smallwords))
                $words[$key] = ucwords($word);
        }
        // Convert back to string and return
        return trim(implode(' ', $words));
    }
}

if(!function_exists('real_snake_case')){
    function real_snake_case($str){
        return preg_replace('/_+/', '_', snake_case(preg_replace('/(\s|-)+/', '_', $str)));
    }
}

if(!function_exists('errorHas')) {
    function errorHas($errors, $name){
        return $errors->has('name')? 'has-error':'';
    }
}

if(!function_exists('errorBlock')) {
    function errorBlock($errors, $name) {
        $out = "";
        if($errors->has('name')) $out .= "<span class='help-block'><strong>". $errors->first('name') ."</strong></span>";
        return $out;
    }
}

if(!function_exists('unique_random')){
    /**
     * https://laracasts.com/discuss/channels/tips/generate-a-unique-random-string-for-the-database
     *
     * Generate a unique random string of characters
     * uses str_random() helper for generating the random string
     *
     * @param     $table - name of the table
     * @param     $col - name of the column that needs to be tested
     * @param int $chars - length of the random string
     *
     * @return string
     */
    function unique_random($table, $col, $chars = 30) {
        $unique = false;

        $tested = [];

        do {
            $random = str_random($chars);

            if(in_array($random, $tested)) continue;

            $count = DB::table($table)->where($col, '=', $random)->count();

            $tested[] = $random;

            if($count == 0) $unique = true;
        } while(!$unique);

        return $random;
    }
}

if(!function_exists('active')){
    /**
     * Check to see if passed named route is the current page.
     * If it is, return active string, else return empty.
     *
     * @param $route - named route
     *
     * @return string
     */
    function active($route) {
        $croute = Route::currentRouteName();
        return strpos($croute, $route) === 0 ? 'active' : '';
    }
}