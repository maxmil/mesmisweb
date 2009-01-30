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
      $this->culture = $this->getUser()->getCulture();

      $context = $this->getContext();

      $this->forward404Unless($this->partialExists($context, $this->content, $this->culture));
   }

   protected function partialExists($context, $name, $culture) {
     
      $directory = $context->getModuleDirectory();

      if (is_readable($directory . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . '_' . $name . '_' . $culture . '.php')) {
         return true;
      } else {
         return false;
      }
   }
}
