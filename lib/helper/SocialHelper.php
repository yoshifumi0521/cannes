<?php
  function hbUsers($url='', $options='') {
    $mode = '';
    if (!$url) $url = str_replace('https://','http://',sfContext::getInstance()->getRequest()->getUri());
    if (!empty($options['mode'])) $mode = "mode={$options['mode']}&";
    if (empty($options['size'])) $options['size'] = 'normal';
    if (empty($options['width'])) $options['width'] = 48;
    if (empty($options['height'])) $options['height'] = 13;
    if (empty($options['style'])) $options['style'] = '';
    $url = str_replace('frontend_dev.php/', '', $url);
    return link_to(image_tag("http://b.hatena.ne.jp/entry/image/{$options['size']}/{$url}", array(
      'width' => $options['width'],
      'height' => $options['height'],
    )), "http://b.hatena.ne.jp/entry?{$mode}url={$url}", array('target' => '_blank'));
  }
  function twShare($url='', $options='') {
    if (!$url) $url = str_replace('https://','http://',sfContext::getInstance()->getRequest()->getUri());

    return <<< EOD
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="{$url}" data-count="vertical" data-lang="ja">Tweet</a>
	<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
EOD;
  }

  function fbShare() {
    $script = url_for('api/static').'?url=http://static.ak.fbcdn.net/connect.php/js/FB.Share';
    return <<< EOD
	<a name="fb_share" type="box_count" href="http://www.facebook.com/sharer.php">シェア</a>
	<script src="{$script}" type="text/javascript"></script>
EOD;
  }

  function fbLike($url='', $options='') {
    if (!$url) $url = str_replace('https://','http://',sfContext::getInstance()->getRequest()->getUri());
    if (empty($options['data-show-faces'])) $options['data-show-faces'] = 'false';
    if (empty($options['data-width'])) $options['data-width'] = 450;
    if (empty($options['data-show-border'])) $options['data-show-border'] = 'false';
    if (empty($options['data-header'])) $options['data-header'] = 'true';

    return <<< EOD
		<style>
		.box {
		  margin: 5px;
		  padding: 5px;
		  background: #D8D5D2;
		  font-size: 11px;
		  line-height: 1.4em;
		  float: left;
		  -webkit-border-radius: 5px;
		     -moz-border-radius: 5px;
		          border-radius: 5px;
		  display: inline;  // IE6 fix
		}</style>
		<div class="fb-like-box" data-href="{$url}" data-width="{$options['data-width']}" data-show-faces="{$options['data-show-faces']}" data-show-border="{$options['data-show-border']}" data-show-border="{$options['data-header']}" data-action="like"></div>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=315004845177312";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
EOD;
  }
    function twCount($url='', $options='') {
      $url = genUrl($url);

      echo link_to(image_tag("http://tools.tweetbuzz.jp/imgcount?url={$url}"), "http://tweetbuzz.jp/redirect?url={$url}", 'target=_blank');
    }

    function hbCount($url='', $options='') {
      $url = genUrl($url);

      return link_to(image_tag("http://b.hatena.ne.jp/entry/image/{$url}"), "http://b.hatena.ne.jp/entry/{$url}", 'target=_blank');
    }

    function genUrl($url, $options='') {
      $context = sfContext::getInstance();
      if (!$url) {
        if (!empty($options['https'])) {
          $url = str_replace('http://','https://',$context->getRequest()->getUri());
        } else {
          $url = str_replace('https://','http://',$context->getRequest()->getUri());
        }
      } else if (strpos($url, '@') === 0) {
        $url = url_for($url);
      }

      if (strpos($url, 'http://') !== 0 && strpos($url, 'https://') !== 0 ) {
        $url = "http://".$context->getRequest()->getHost().$url;
      }
      $url = str_replace('/frontend_dev.php', '', $url);
      return $url;
    }

    function addBtn($url='', $type='facebook', $nickname='') {
      $url = genUrl($url, $type == 'facebook' ? array('https' => true) : null);

      if ($type == 'facebook') {
        $str = <<< EOD
<div class="fb-like" data-href="{$url}" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>
EOD;
      } elseif ($type == 'twitter') {
        $str = <<< EOD
<a href="http://twitter.com/share" class="twitter-share-button"  data-url="{$url}" data-count="horizontal"  data-width="90px" data-lang="ja">Tweet</a>
EOD;
      } elseif ($type == 'follow') {
        $str = <<< EOD
<a href="https://twitter.com/{$nickname}" class="twitter-follow-button" data-show-count="true" data-lang="ja">@{$nickname}をフォローする</a>
EOD;
      } elseif ($type == 'hatena') {
        $str = <<< EOD
<a href="http://b.hatena.ne.jp/entry/{$url}" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
EOD;
      } elseif ($type == 'google+') {
        $str = <<< EOD
<g:plusone size="medium"></g:plusone>
EOD;
      }

      return $str;
    }

    function addScript() {
      $str = <<< EOD
<?php use_javascript('addScript.js') ?>
EOD;

      return $str;
    }

    function twWidget() {
      $str = <<< EOD
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 2,
  interval: 30000,
  width: 200,
  height: 200,
  theme: {
    shell: {
      background: '#d66a22',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#919191',
      links: '#5994eb'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('tada29com').start();
</script>
EOD;

      return $str;
    }

/*
      $str = <<< EOD
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
EOD;
      return $str;
**/
