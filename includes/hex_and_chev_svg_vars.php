<?php
        //SVG code split because of loop, will then be echoed out as 1 bit of code
        $svgPt1='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 275 100" preserveAspectRatio="xMinyMin meet"><defs><pattern id="hexagon';
        $svgPt1b='Pattern" height="100%" width="100%" patternContentUnits="objectBoundingBox" viewBox="0 0 1 1" preserveAspectRatio="xMidYMid slice"><image height="1" width="1" preserveAspectRatio="xMidYMid slice" xlink:href="images/';
        //insert: hexagon image
        $svgPt1Close='" /></pattern>'; 
        $svgPt2Open='<pattern id="chevPattern';//insert num
        $svgPt2Close='" height="100%" width="100%" patternContentUnits="objectBoundingBox" viewBox="0 0 1 1" preserveAspectRatio="xMidYMid slice"><image height="1" width="1" preserveAspectRatio="xMidYMid slice" xlink:href="images/';
        //insert: chev1 image
        //insert: chev2 image
        //insert: chev3 image
        $svgPt5='</defs>';
        //insert opening a and title tags; ie:<a xlink:href="#"><title>My Title</title> 
        $svgPt6CloseHexA='<polygon points="78.25 8 29.75 8 5.5 50 29.75 92 78.25 92 102.5 50 78.25 8" fill="url(#hexagon';
        $svgPt6CloseHexAb='Pattern)"/></a>';
        $svgPolyChev='<polygon points="134.25 8 104.75 8 129 50 104.75 92 134.25 92 158.5 50 134.25 8" ';
        $svgPolyTranslate='transform="translate(';
        $svgPolyTranslateClose=')" ';
        $svgPt6CloseChevA1='fill="url(#chevPattern';//insert num
        $svgPt6CloseChevA2=')"/><text x="';
        //translate x value
        $svgPt6CloseChevA3='" y="85">'.$SVGText.'</text></a>';
        //close the SVG
        $svgPt7CloseSVG='</svg>';
        $totalSVGPt1=$totalSVGPt2="";

        //So... overall complicated, but because of pulling data from the database, merging together two tables, and the way the results are displayed, this is the easiest way to get exactly the look we want.
        //Other option would be to split the SVG into 2 (hex & chevrons), but then it might not line up correctly

?>