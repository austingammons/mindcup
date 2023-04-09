<?php

include 'Analyzer.php';

// get score from an array of strings:
// $score->multiple(array_column($data, 'thought')); 

// get score from a string:
// $score->single($record["thought"]);

class Score {

    public $analyzer;

    function __construct() {
        $this->analyzer = new Sentiment\Analyzer();
    }

    function analyze ($text) {

        return $this->analyzer->getSentiment($text);

    }

    function rate ($compound) {

        if ($compound < -0.5) {
            echo "very negative";
        } else if ($compound < 0.0 && $compound > -0.5) {
            echo "negative";
        } else if ($compound > 0.5) {
            echo "very positive";
        } else if ($compound > 0.0 && $compound < 0.5) {
            echo "positive";
        } else if ($compound > -0.15 && $compound < 0.15) {
            echo "neutral";
        }
        
    }

    function single($text) {

        $analysis = $this->analyze($text);
        $result = $analysis['compound'];

        $this->rate($result);

    }

    function multiple ($texts) {

        $result = 0;

        foreach ($texts as $index => $text) {
            $analysis = $this->analyze($text);
            $result += $analysis['compound'];
        }

        $this->rate($result);

    }
}


// $analyzer = new Sentiment\Analyzer();

// // Analyze textual data and converts it into a scoring array
// function analyze ($text) {

//     return $analyzer->getSentiment($thought);

// }

// function score ($text) {

//     $result = analyze($text);
//     $compound = $result['compound'];

//     if ($compound < -0.5) {
//         echo "very negative";
//     } else if ($compound < 0.0 && $compound > -0.5) {
//         echo "negative";
//     } else if ($compound > 0.5) {
//         echo "very positive";
//     } else if ($compound > 0.0 && $compound < 0.5) {
//         echo "positive";
//     } else if ($compound > -0.15 && $compound < 0.15) {
//         echo "neutral";
//     }
    
// }

// function score_many ($texts) {

//     $result = 0;

//     foreach ($texts as $index => $text) {
//         $analysis = analyze($thought['thought']);
//         $result += $analysis['compound'];
//     }

//     return $result;

// }
