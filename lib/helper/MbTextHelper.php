<?php
/*
    TextHelper::truncate_textのマルチバイト対応
*/

function mb_truncate_text(
                          $text, $length = 30,
                          $truncate_string = '...',
                          $truncate_lastspace = false
                          )
{
  mb_internal_encoding("UTF-8");

  if ($text == '') return '';
  if (mb_strlen($text) > $length)
  {
    $truncate_text = mb_substr($text, 0, $length - strlen($truncate_string));
    if($truncate_lastspace)
    {
      $truncate_text = mb_preg_replace('/\s+?(\S+)?$/', '', $truncate_text);
    }

    return $truncate_text.$truncate_string;
  }
  else
  {
    return $text;
  }
}

//テキストの自動リンク化
function autoLinker($str)
{
  $pat_sub = preg_quote('-._~%:/?#[]@!$&\'()*+,;=', '/'); // 正規表現向けのエスケープ処理
  $pat  = '/((http|https):\/\/[0-9a-z' . $pat_sub . ']+)/i'; // 正規表現パターン
  $rep  = '<a href="\\1" target="_blank">\\1</a>'; // \\1が正規表現にマッチした文字列に置き換わります
  $str = preg_replace ($pat, $rep, nl2br($str)); // 実処理

  return $str;

}

//NGフィルターをする
function ngFilter($str)
{
  $ng_words_yml = Spyc::YAMLLoad(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config/ng_words.yml');
  $ng_words = $ng_words_yml["core"]["ng_words"];
  $regexp = "|";
  foreach ($ng_words as $key => $ng_word)
  {
      $regexp = $regexp."(".$ng_word.")|";
  }
  mb_regex_encoding ('UTF-8');
  $output = mb_ereg_replace( "/{$regexp}/u",'<span style="color:#AAAAAA;">\\0</span>',$str);
  return $output;
}









?>