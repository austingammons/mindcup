<?php

include 'Analyzer.php';

function analyze($thought) {

    $analyzer = new Sentiment\Analyzer(); 
    $result = $analyzer->getSentiment($thought);

    $compound = $result["compound"];

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