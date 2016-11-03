<?php

namespace Dive\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DiveUserBundle extends Bundle
{
	public function getParent()
  {
    return 'FOSUserBundle';
  }
}
