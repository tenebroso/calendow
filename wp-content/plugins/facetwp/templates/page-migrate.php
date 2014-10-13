<?php

$export = array();
$settings = FWP()->helper->settings_raw;

foreach ( $settings['facets'] as $facet ) {
    $export['facet-' . $facet['name']] = 'Facet - ' . $facet['label'];
}

foreach ( $settings['templates'] as $template ) {
    $export['template-' . $template['name']] = 'Template - '. $template['label'];
}

?>
<style type="text/css">
.facetwp-content .export-code,
.facetwp-content .import-code {
    height: 100px;
}

.export-code {
    display: none;
}
</style>

<table style="width:100%; margin-top:20px">
    <tr>
        <td style="width:175px; vertical-align:top">
            <?php _e( 'Export', 'fwp' ); ?>
        </td>
        <td valign="top" style="width:260px">
            <select class="export-items" multiple="multiple" style="width:250px; height:100px">
                <?php foreach ( $export as $val => $label ) : ?>
                <option value="<?php echo $val; ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
            <div style="margin-top:5px"><a class="button export-submit"><?php _e( 'Export', 'fwp' ); ?></a></div>
        </td>
        <td valign="top">
            <textarea class="export-code" placeholder="Loading..."></textarea>
        </td>
    </tr>
</table>

<table style="width:100%; margin-top:20px">
    <tr>
        <td style="width:175px; vertical-align:top">
            <?php _e( 'Import', 'fwp' ); ?>
        </td>
        <td>
            <div><textarea class="import-code" placeholder="<?php _e( 'Paste the import code here', 'fwp' ); ?>"></textarea></div>
            <div><input type="checkbox" class="import-overwrite" /> <?php _e( 'Overwrite existing items?', 'fwp' ); ?></div>
            <div style="margin-top:5px"><a class="button import-submit"><?php _e( 'Import', 'fwp' ); ?></a></div>
        </td>
    </tr>
</table>
