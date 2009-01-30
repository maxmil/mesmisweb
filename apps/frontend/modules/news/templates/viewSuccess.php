<?php use_helper('Date') ?>

<table>
  <tr>
    <td class="niPhoto"><?php echo image_tag('/uploads/'. $newsItem->getPhotoFilename()) ?></td>
    <td class="niSum">
      <div class="niCreatedAt"><?php echo format_date($newsItem->getCreatedAt(), 'dd/MM/yyyy')  ?></div>
      <div class="niTitle"><?php echo $newsItem->getTitle() ?></div>
      <div class="niDescrip"><?php echo $newsItem->getBody() ?></div>
    </td>
  </tr>
</table>
