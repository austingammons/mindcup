<?php

include 'Analyzer.php';

function analyze($thought) {

    $analyzer = new Sentiment\Analyzer(); 
    $result = $analyzer->getSentiment($thought);

    $compound = $result["compound"];

    if ($compound < -0.5) {
        echo "<b>very negative</b>";
    } else if ($compound < 0.0 && $compound > -0.5) {
        echo "<b>negative</b>";
    } else if ($compound > 0.5) {
        echo "<b>very positive</b>";
    } else if ($compound > 0.0 && $compound < 0.5) {
        echo "<b>positive</b>";
    } else if ($compound > -0.15 && $compound < 0.15) {
        echo "<b>neutral</b>";
    }

}