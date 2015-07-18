<?php
class WordsController extends AbstractController
{
  /**
   * GET method.
   *
   * @param  Request $request
   * @return string
   */
  public function get($request)
  {
    $sQuery = $request->parameters['term'];
    return ReverseIndex::getMatches($sQuery);
  }


}
