<?php
namespace Entity;

use Entity\ECustomer;

$a = new ECustomer("sorgandri03", "sorgandri03@gmail.com");

print $a->getEmail();