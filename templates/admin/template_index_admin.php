
<table class="table table-hover">
<thead>
    <tr>
    <th>id</th><th>post</th><th>status</th>
</tr>
</thead>
<tbody>
    <?php $i=count($TopViewsPosts);?>
        <?php if($TopViewsPosts) : for($col=0; $col < count($TopViewsPosts); $col++) { ?>
            <tr>
                <td>
                    <?php echo $col+1;?>    
                </td>
                <td>
                    <a href="<?php echo DOCROOT; ?>editslide/<?php echo $TopViewsPosts[$col]['id'].'/'.$TopViewsPosts[$col]['slug']; ?>"><span class="h5 color-2"><?php echo $TopViewsPosts[$col]['title']; ?></span></a>
                </td>
                <td>
                    <?php if($TopViewsPosts[$col]['status'] == 0):?>
                    Saved
                <?php else: ?>
                    Published
                <?php endif;?>    
                </td>
            </tr>
            
            <?php } endif; ?>
    
</tbody>
            </table>
    <?php echo $pagination;?>