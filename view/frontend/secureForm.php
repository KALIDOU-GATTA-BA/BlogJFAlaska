<?php
function secureForm($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=strip_tags($data);
            $data=htmlspecialchars($data);
            return $data;
        }