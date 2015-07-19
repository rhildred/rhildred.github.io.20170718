<?php
class ResultsController extends AbstractController
{
  /**
   * GET method.
   *
   * @param  Request $request
   * @return string
   */
  public function get($request)
  {
    $sQuery = $request->parameters['q'];
    return ReverseIndex::getDocuments($sQuery);
  }


}
