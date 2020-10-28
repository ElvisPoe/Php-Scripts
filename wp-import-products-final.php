<?php 

/*
 * Title and SKU are required.
 * Price and Stock are optional.
 * All empty fields have a default value.
 *
 */

$products = array(
    ["title" => "Free", "sku" => "free-11", "stock"=> 10, "short_desc"=> "Η συρταριέρα Free μινιμαλιστικού σχεδιασμού, ιδιαίτερα λειτουργική με την προέκταση γραφείου και τη δυνατότητα περιστροφής αυτού. Παράγεται από ξύλο δρυός και οξυάς σε διάφορες διαστάσεις και αποχρώσεις."],
    ["title" => "Αφροδίτη", "sku" => "afroditi-11", "stock"=> 10, "short_desc"=> "Κονσόλα Αφροδίτη ιδιαίτερου σχεδιασμού, με χαρακτηριστικό γνώρισμα το συνδυασμό κυβιστικής επιφάνειας και καλλίγραμμης 'πλεκτής' βάσης. Είναι κατασκευασμένη από ξύλο οξυάς και καρυδιάς με προαιρετική χρήση πατίνας."],
    ["title" => "Beluga", "sku" => "beluga-11", "stock"=> 10, "short_desc"=> "Κονσόλα σε νεομπαρόκ σχεδιασμό με την χρήση ασημοπατίνας στην κολώνα της, όπως και στον καθρέπτη. Κατασκευασμένη από ξύλο δρυός, σε πολλούς χρωματισμούς. Οι διαστάσεις της είναι 120x40x80cm ύψος."],
    ["title" => "Chanel", "sku" => "chanel-11", "stock"=> 10, "short_desc"=> "Αφαιρετικού σχεδιασμού κονσόλα. Κατασκευασμένη από ξύλο δρυός, σε πολλούς χρωματισμούς.Οι διαστάσεις της είναι 120x42x170cm ύψος."],
);

function insertProductTest($data){
    /* If there is no title & no SKU -> Stop */
    if (!isset($data['title']) || empty($data['title'])) {
        return false;
    }
    if (!isset($data['description'])) $data['description'] = '';
    if (!isset($data['status'])) $data['status'] = 'draft';

    if (!wc_get_product_id_by_sku($data['sku'])) {

        $post_id = wp_insert_post(array(
            'post_title' => $data['title'],
            'post_name' => sanitize_title($data['title']),
            'post_content' => $data['description'],
            'post_excerpt'   => $data['short_desc'],
            'post_status' => $data['status'],
            'post_type' => 'product',
        ));
        
        /* 
        Easier to undestand Way

        $my_post = array(
            'post_title' => $data['title'],
            'post_name' => sanitize_title($data['title']),
            'post_content' => $data['description'],
            'post_excerpt'   => $data['short_desc'],
            'post_status' => $data['status'],
            'post_type' => 'product',
        );
        $post_id = wp_insert_post($my_post);
        */

        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_sku', $data['sku']);

        echo "Product with ID:" . $post_id . " and SKU:". $data['sku'] ." added! <br/>";

    } else {
        echo "Sku:" . $data['sku'] . " allready exists!";
    }
    return true;
}


/* Allow only this link to run the script and loop */
if ($_SERVER['REQUEST_URI'] == "/prod") {
    foreach ($products as $data) {
        insertProductTest($data);
    }
    echo "All done!";
    die();
}
