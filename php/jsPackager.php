<?php

// jsPackager puts HTML around php class name lines, comments, method calls,
// and codelines.
class jsPackager implements Packager {
   
    private $divCount = 0;
    private $commentBlock = FALSE;

    function __construct() {
    }
   
    public function packager($fileLine, $braceCount) {
        $fileLine = htmlspecialchars($fileLine);
        $html = '';

        // Open div wrapper for code block
        if ($this->divCount < $braceCount) {
            $this->divCount = $braceCount;
            $html = '<div class="block">';
        }

        // Enables comment state
        if (strpos($fileLine, '/*') > -1) {
            $this->commentBlock = TRUE;
        }

        // Skip line tests if in comment state
        if ($this->commentBlock === FALSE) {
            $html .= $this->lineMatch($fileLine, $braceCount);
        } else {
            $html .= "<div class='mlComment'>$fileLine</div>";
        }

        // Disables comment state
        if (strpos($fileLine, '*/') > -1) {
            $this->commentBlock = FALSE;
        }

        // Close div wrapper at end of code block
        if ($this->divCount > $braceCount) {
          $this->divCount = $braceCount;
          $html .= '</div>';
        }
        return $html;
    }

    // Determines what type of javascript line was passed in
    private function lineMatch($fileLine, $braceCount) {
        $html = '';
        $cmExpr = '/(?<!:)\/\/.*\R/';
        $fnExpr = '/^(.*)?function(.\w)?\((.*)?\)( )*{/';
        $emExpr = '/^( )*\R/';
        $codelineExpr = '';

        switch ($fileLine) {
            // matches comment
            case (preg_match($cmExpr, $fileLine, $lnCm) ? TRUE : FALSE) :
                $codeLine = explode("//", $fileLine);
                isset($lnCm[0]) AND
                    $html .= "<div class='codeLine'>$codeLine[0]<span class='comment'>$lnCm[0]</span></div>";
                break;
            // matches function
            case (preg_match($fnExpr, $fileLine, $lnFn) ? TRUE : FALSE) :
                $this->divCount = $braceCount;
                $html .= "<div class='blockStart'>$fileLine</div>";
                break;
            // matches empty line
            case (preg_match($emExpr, $fileLine, $lnEm) ? TRUE : FALSE) :
                break;

            default :
                $html = "<div class='codeLine'>$fileLine</div>";
        }

        return $html;
    }
}
