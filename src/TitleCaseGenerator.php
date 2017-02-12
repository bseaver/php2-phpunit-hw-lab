<?php
    class TitleCaseGenerator
    {
        function makeTitleCase($input_title)
        {
            $input_array_of_words = explode(" ", $input_title);
            $output_title_cased = array();
            foreach ($input_array_of_words as $word) {
                array_push($output_title_cased, ucfirst($word));
            }
            return implode(" ", $output_title_cased);
        }
    }
?>
