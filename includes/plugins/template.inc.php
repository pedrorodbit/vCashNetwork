<?php
$template = new Smarty();

$template->caching = true;
$template->compile_check = true;
$template->force_compile = false;
$template->cache_lifetime = 3600 * 24 * 7;

$theme = 'bootstrap'; //bootstrap or ....?

function minify_html($tpl_output, Smarty_Internal_Template $template) {
  $tpl_output = trim(preg_replace('![\t ]*[\r\n]+[\t ]*!', '', $tpl_output));
  $tpl_output = trim(preg_replace('#<!--[^>]+-->#', '', $tpl_output));
  return $tpl_output;
}

$template->registerFilter('output', 'minify_html');

$template->setCacheDir(ROOTPATH . 'themes/' . $theme . '/cache');
$template->setTemplateDir(ROOTPATH . 'themes/' . $theme . '/template');
$template->setCompileDir(ROOTPATH . 'themes/' . $theme . '/template_c');
