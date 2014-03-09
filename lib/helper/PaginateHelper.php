<?php
// pagerクラスを使わない独自ページャ
function next_link($text='&nbsp;',$page=null,$routing=null) {
  $sf_context = sfContext::getInstance();
  
  $param = '';
  foreach($_GET as $k => $v) {
    if (!$v/* || in_array($k, array('page'))*/) continue;
    $param.=$param ? '&' : "?";
    if ($k == 'page') {
      $v = $page ? $page : $v + 1;
    }
    $param.="{$k}={$v}";
  }
  
  if (empty($routing)) $routing = $sf_context->getModuleName().'/'.$sf_context->getActionName();
  $next_link = $routing.$param;
  
  return link_to($text, $next_link, array('id' => 'next'));
}

// Propelのページャクラス依存のページャ
function pager_navigation($pager, $uri=null){

  if (!$uri) {
    $sf_context = sfContext::getInstance();
    
    $param = '';
    foreach($_GET as $k => $v) {
      if (!$v/* || in_array($k, array('page'))*/) continue;
      $param.=$param ? '&' : "?";
      if ($k != 'page') {
        $param.="{$k}={$v}";
        //$v = $page ? $page : $v + 1;
      }
    }
    $uri = $sf_context->getModuleName().'/'.$sf_context->getActionName();
    $uri = $uri.$param;
  }
  

  $navigation = '';

  if ($pager->haveToPaginate()){
    $navigation .= '<center>';
    $uri .= (preg_match('/\?/', $uri) ? '&' : '?') . 'page=';

    if($pager->getPage() != 1){
      $navigation .= link_to('&laquo;', $uri.$pager->getFirstPage()) . '&nbsp;';
      $navigation .= link_to('&lt;', $uri.$pager->getPreviousPage()) . '&nbsp;';
    }

    $links = $pager->getLinks();
    foreach ($links as $page){
      if($page == $pager->getPage())
        $navigation .= $page . '&nbsp;';
      else
        $navigation .= link_to($page, $uri.$page) . '&nbsp;';
    }
    
    if($pager->getPage() != $pager->getCurrentMaxLink()){  
      $navigation .= link_to('&gt;', $uri.$pager->getNextPage(), array('id' => 'next')) . '&nbsp;';
      $navigation .= link_to('&raquo;', $uri.$pager->getLastPage()) . '&nbsp;';
    }
    $navigation .= '</center>';
  }

  return $navigation;

}


/**
 * "%件中 % - % 件目"という表示のコードを取得する
 *
 * @param sfPager $pager ページャー
 * @param string $format コードのフォーマット
 */
function pager_position($pager, $type = '件', $format = '')
{
	if ($format === '')
	{
		$format = '<strong>%1$d</strong>%4$s中 <strong>%2$d</strong>%4$s目 ～ <strong>%3$d</strong>%4$s目';
	}
	
	return sprintf($format,
		$pager->getNbResults(),
		($pager->getPage() - 1) * $pager->getMaxPerPage() + 1,
		min($pager->getPage() * $pager->getMaxPerPage(), $pager->getNbResults()),
		$type
	);
}