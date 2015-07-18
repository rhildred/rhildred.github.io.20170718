<?php
class StemsController extends AbstractController
{
  /**
   * GET method.
   *
   * @param  Request $request
   * @return string
   */
  public function get($request)
  {
    $sQuery = $request->url_elements[1];
    return ReverseIndex::getDocuments($sQuery);
  }


}
