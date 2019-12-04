<?php
function cleanTags($tags) {
  function cleanTag($tag) {
    return preg_replace("/[^a-zA-Z0-9]+/","",$tag);
  }
//  function filter_none($tags) {
//    $real_tags = array()
//      foreach ($tags as $tag) {
//        if (strlen($tag) > 0) {
//          array_push($real_tags, $tag);
//        }
//      }
//    }
  $tags = preg_split("/[ \t]+/",$tags);
//  $tags = filter_none($tags);
  array_map("cleanTag", $tags);
  return $tags;
}
