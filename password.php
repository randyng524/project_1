<?php
$hashpw = password_hash("staff2", PASSWORD_BCRYPT);

if(password_verify("staff2",$hashpw))
{
    echo  'yes';
}
else
{
    echo'No';
}