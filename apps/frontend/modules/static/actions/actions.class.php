<?php

/**
 * Generate static pages.
 *
 * @package    mesmisweb
 * @subpackage static
 * @author     Max Pimm (mail at alwayssunny.com)
 */
class staticActions extends sfActions {
  
 /**
  * Includes a partial page using the "content" request parameter as the file
  * name.
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request) {

      $this->content = $this->getRequestParameter("content");

      $context = $this->getContext();

      $this->forward404Unless($this->partialExists($context, $this->content));
   }

   protected function partialExists($context, $name) {
     
      $directory = $context->getModuleDirectory();

      if (is_readable($directory . DIRECTORY_SEPARATOR ."templates". DIRECTORY_SEPARATOR ."_". $name .".php")) {
         return true;
      } else {
         return false;
      }
   }
}
