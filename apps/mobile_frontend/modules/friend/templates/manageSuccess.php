<?php op_mobile_page_title(__('ﾌﾚﾝﾄﾞ管理')) ?>

<center>
<?php echo pager_total($pager); ?>
</center>

<?php
$list = array();
foreach ($pager->getResults() as $member)
{
  $vars = array('id' => $member->getId());
  $list[] = get_customizes('id_name', 'before', $vars)
          . link_to(sprintf('%s(%d)', $member->getName(), $member->countFriends()), 'member/profile?id='.$member->getId()).'<br>'
          . get_customizes('id_name', 'after', $vars)
          . get_customizes('id_friend', 'before', $vars)
          . ' ['.link_to(__('ﾌﾚﾝﾄﾞから外す'), 'friend/unlink?id='.$member->getId()).']'
          . get_customizes('id_friend', 'after', $vars);
}

$option = array(
  'border' => true,
);

op_include_list('friendList', $list, $option);
?>

<?php echo pager_navigation($pager, 'friend/list?page=%d&id=' . $sf_params->get('id'), false); ?>
