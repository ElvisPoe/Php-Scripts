<?php

/*
 * Title and SKU are required.
 * Price and Stock are optional.
 * All empty fields have a default value.
 *
 */

$products = array(
    ["title" => "Garden Hoe", "sku" => "G001-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Leaf Rake", "sku" => "G002-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Shovel", "sku" => "G003-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Straight Rake", "sku" => "G004-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Sun Hat", "sku" => "G012-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Gardening Apron", "sku" => "G013-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Pullback Airplane", "sku" => "JK029-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Pullback Sports Car", "sku" => "JK030-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Bird Feeder", "sku" => "K020-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Police Car", "sku" => "K096-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Custom Racer", "sku" => "OK004-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Bulldozer", "sku" => "OK005-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Dump Truck", "sku" => "OK006-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Treasure Chest", "sku" => "OK010BUD-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Formula Racing Car", "sku" => "OK011-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Road Racer", "sku" => "OK012-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Sprint Racer", "sku" => "OK013-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Bulldozer", "sku" => "OK017-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Catapult Truck", "sku" => "OK020-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Dune Buggy", "sku" => "OK028-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Catapult", "sku" => "OK034-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Beach Buggy", "sku" => "OK036-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Candy Drop", "sku" => "OK037-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Light Plane", "sku" => "OK038-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "10PC Garden Tool Set", "sku" => "SH003-10-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "10PC Garden Tool Set B", "sku" => "SG004-10-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "3PC Garden Tool Set", "sku" => "SGH001-03-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "4PC Garden Tool Set", "sku" => "SGH008-04-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "5PC Toolset", "sku" => "ST004-05-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Tool Belt", "sku" => "T010M-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Work Gloves", "sku" => "T014-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Toolbox and 5PC Toolset", "sku" => "TBS001-05-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "4 Kits & 3PCS Toolset", "sku" => "U009-K02-T03-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "2 Wood Kits & 6 Piece Toolset", "sku" => "U009-K02-T06-SY", "price" => 0.00, "stock"=> 10],
    ["title" => "Work Bench", "sku" => "WB002-SY", "price" => 0.00, "stock"=> 10]
);

function insertProductTest($data)
{
    /* If there is no title & no SKU -> Stop */
    if (!isset($data['title']) || empty($data['title']) || !isset($data['sku']) || empty($data['sku'])) {
        return false;
    }

    /* Check for entered data and set defaults */
    if (!isset($data['description'])) $data['description'] = '';
    if (!isset($data['status'])) $data['status'] = 'draft';
    if (!isset($data['visibility'])) $data['visibility'] = 'visible';
    if (!isset($data['manage_stock'])) $data['manage_stock'] = 'no';
    if (!isset($data['stock']) || empty($data['stock'])) $data['stock'] = 0;
    if (!isset($data['stock_status']) || empty($data['stock_status'])) {
        if (empty($data['stock'])) {
            $data['stock_status'] = 'outofstock';
        } else {
            $data['stock_status'] = 'instock';
        }
    }
    if (!isset($data['weight'])) $data['weight'] = '';
    if (!isset($data['height'])) $data['height'] = '';
    if (!isset($data['length'])) $data['length'] = '';
    if (!isset($data['purchase_note'])) $data['purchase_note'] = '';
    if (!isset($data['featured'])) $data['featured'] = 'no';
    if (!isset($data['total_sales'])) $data['total_sales'] = 0;
    if (!isset($data['backorders'])) $data['backorders'] = 'no';
    if (!isset($data['sold_individually'])) $data['sold_individually'] = '';
    if (!isset($data['virtual'])) $data['virtual'] = 'no';
    if (!isset($data['downloadable']) || $data['virtual'] == 'no') $data['downloadable'] = 'no';
    if (!isset($data['price'])) $data['price'] = 0;
    if (!isset($data['regular_price'])) $data['regular_price'] = $data['price'];
    if (!isset($data['sale_price'])) {
        $data['sale_price'] = '';
    } else {
        if (!empty($data['sale_price'])) {
            if (!isset($data['regular_price']) || empty($data['regular_price'])) {
                $data['regular_price'] = $data['price'];
            }
        }
        $data['price'] = $data['sale_price'];
    }
    if (!isset($data['attributes'])) $data['attributes'] = array();
    if (!isset($data['sale_price_dates_from'])) $data['sale_price_dates_from'] = '';
    if (!isset($data['sale_price_dates_to'])) $data['sale_price_dates_to'] = '';

    /* If the sku does not exists -> insert the product */
    if (!wc_get_product_id_by_sku($data['sku'])) {
        $post_id = wp_insert_post(array(
            'post_title' => $data['title'],
            'post_name' => sanitize_title($data['title']),
            'post_content' => $data['description'],
            'post_status' => $data['status'],
            'post_type' => 'product',
        ));

        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_short_description', $data['short_desc']);
        update_post_meta($post_id, '_sku', $data['sku']);
        update_post_meta($post_id, '_price', $data['price']);
        update_post_meta($post_id, '_regular_price', $data['regular_price']);
        update_post_meta($post_id, '_sale_price', $data['sale_price']);
        update_post_meta($post_id, '_visibility', $data['visibility']);
        update_post_meta($post_id, '_stock_status', $data['stock_status']);
        update_post_meta($post_id, '_stock', $data['stock']);
        update_post_meta($post_id, '_manage_stock', $data['manage_stock']);
        update_post_meta($post_id, '_backorders', $data['backorders']);
        update_post_meta($post_id, '_featured', $data['featured']);
        update_post_meta($post_id, '_total_sales', $data['total_sales']);
        update_post_meta($post_id, '_sold_individually', $data['sold_individually']);
        update_post_meta($post_id, '_downloadable', $data['downloadable']);
        update_post_meta($post_id, '_virtual', $data['virtual']);
        update_post_meta($post_id, '_purchase_note', $data['purchase_note']);
        update_post_meta($post_id, '_weight', $data['weight']);
        update_post_meta($post_id, '_height', $data['height']);
        update_post_meta($post_id, '_length', $data['length']);
        update_post_meta($post_id, '_product_attributes', $data['attributes']); // array
        update_post_meta($post_id, '_sale_price_dates_from', $data['sale_price_dates_from']);
        update_post_meta($post_id, '_sale_price_dates_to', $data['sale_price_dates_to']);

    }

    var_dump("SKU allready exists");
    return false;
}

/* Allow only my IP to run the script and loop */
if ($_SERVER['REMOTE_ADDR'] == "87.203.91.247") {
    foreach ($products as $data) {
        insertProductTest($data);
    }
    die();
}




/* More siple way */

/*
 * Title and SKU are required.
 * Price and Stock are optional.
 * All empty fields have a default value.
 *
 */


$products = array(
    ["title" => "Garden Hoe", "sku" => "G001-SY", "price" => 0.00, "stock"=> 10, "description"=> "Desctest"],
    ["title" => "Work Bench", "sku" => "WB002-SY", "price" => 0.00, "stock"=> 10, "description"=> "Desctest"]
);

function insertProductTest($data){
    /* If there is no title & no SKU -> Stop */
    if (!isset($data['title']) || empty($data['title']) || !isset($data['sku']) || empty($data['sku'])) {
        return false;
    }
    if (!isset($data['description'])) $data['description'] = '';
    if (!isset($data['status'])) $data['status'] = 'draft';
    if (!isset($data['price'])) $data['price'] = 0;

    if (!wc_get_product_id_by_sku($data['sku'])) {

        $post_id = wp_insert_post(array(
            'post_title' => $data['title'],
            'post_name' => sanitize_title($data['title']),
            'post_content' => $data['description'],
            'post_status' => $data['status'],
            'post_type' => 'product',
        ));
        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_sku', $data['sku']);
        update_post_meta($post_id, '_price', $data['price']);

    } else {
        echo "Sku allready exists!";
    }
    return true;
}

/* Allow only this link to run the script and loop */
if ($_SERVER['REQUEST_URI'] == "/stanleyjr/prod123") {
    foreach ($products as $data) {
        //insertProductTest($data);
    }
    //echo "All done!";
    //die();
}




/* Kokkoris products */
/* Import Products */

/*
 * Title and SKU are required.
 * Price and Stock are optional.
 * All empty fields have a default value.
 *
 */

$products = array(
    ["title" => "Sixty 2", "sku" => "Sixty 2", "stock"=> 10, "short_desc"=> "Σαλόνι 'Sixty 2' με μεταλλικό σκελετό, ξύλο οξυάς, καλουπωτά μαξιλάρια και δυνατότητα επιλογής διαστάσεων και αποχρώσεων."],

    ["title" => "Aston", "sku" => "Aston", "stock"=> 10, "short_desc"=> "Ιδιαίτερα πρακτική γωνία με εναλλασσόμενες θέσεις, ενσωματωμένα καθίσματα και βοηθητικό τραπεζάκι στην άκρη. Τα σκελετά είναι από ξύλο οξυάς και τα καθίσματα από καλουπωτό λάστιχο. Παράγεται σε διάφορες διαστάσεις με ύφασμα επιλογής (αποσπώμενο)."],

    ["title" => "Habbit", "sku" => "Habbit", "stock"=> 10, "short_desc"=> "Ιδιαίτερο,αναπαυτικό και λειτουργικό σαλόνι με πρακτικές ανακλίσεις (ανάκλιση χωρίς μείωση βάθους)και ξεχωριστή ραφή περιφερειακά. Παράγεται σε διάφορες διαστάσεις από ξύλο οξυάς, καθίσματα από λάστιχο και πούπουλα στα μαξιλάρια πλάτης. Διαστάσεις φωτογραφίας 305Χ235Χ100εκ."],

    ["title" => "Ερμής", "sku" => "Ερμής", "stock"=> 10, "short_desc"=> "Σαλόνι ''Ερμής'' από ξύλο οξυάς και καλουπωτά λάστιχα με δυνατότητα επιλογής διαστάσεων και υφασμάτων."],

    ["title" => "Moon", "sku" => "Moon", "stock"=> 10, "short_desc"=> "Ιδιαιτέρως άνετο σαλόνι με εξειδικευμένα υλικά καθίσματος για ιδανική ξεκούραση. Αποσπώμενο κάλυμμα και δυνατότητα παραγωγής σε απεριόριστες διαστάσεις και υφάσματα."],

    ["title" => "Dali", "sku" => "Dali", "stock"=> 10, "short_desc"=> "Ιδιαίτερα αναπαυτικό σαλόνι μινιμαλιστικού σχεδιασμού με διακριτικές γαζωμένες πλευρές στο σκελετό του. Είναι κατασκευασμένο απο ξύλο οξυάς. Τα καθίσματα του είναι απο λάστιχο με ειδική βάτα στην άνω πλευρά και τα μαξιλάρια πλάτης απο πούπουλο. Το ύφασμα είναι αποσπώμενο(δική σας επιλογής) και παράγεται σε διάφορες διαστάσεις. Διάσταση φωτογραφίας: 307x230"],

    ["title" => "Avenue_Ορθή", "sku" => "Avenue_Ορθή", "stock"=> 10, "short_desc"=> "Μοντέρνου δυναμικού σχεδιασμού γωνία με διακοσμητικές προεκτάσεις. Κατασκευασμένη απο σκελετά οξυάς συνδιασμένα με λάστιχα στα καθίσματα και πούπουλο στις πλάτες. Τα υφάσματα είναι φορετά και επιλογής του πελάτη. Γωνιακός καναπές 307x225x97 με δυνατότητα τροποποίησης."],

    ["title" => "Limit", "sku" => "Limit", "stock"=> 10, "short_desc"=> "Σαλόνι σε μοντέρνα γραμμή με δυνατότητα γωνιακού καθίσματος. Κατασκευασμένο απο σκελετά οξυάς και ύφασμα φορετό επιλογής του πελάτη. Οι διαστάσεις είναι: 300x300x100, με δυνατότητα προσαρμογής"],

    ["title" => "Limit Ορθή", "sku" => "Limit Ορθή", "stock"=> 10, "short_desc"=> "Γωνία σε μοντέρνα λιτή γραμμή. Κατασκευασμένη απο σκελετά οξυάς με ύφασμα φορετό και επιλογής του πελάτη. Τα καθίσματα είναι απο λάστιχο καλουπωτό ή και πούπουλο και τα μαξιλάρια της πλάτης απο πούπουλο με comforell ,με διαστάσεις 300x300x100."],

    ["title" => "Loft Tel", "sku" => "Loft Tel", "stock"=> 10, "short_desc"=> "Σαλόνι γωνία Loft λιτού σχεδιασμού απο σκελετά οξυάς με ιδιαίτερο χαρακτηριστικό την απόσπαση του μπράτσου του ανάκλινδρου δημιουργώντας έτσι μια έξτρα επιφάνεια χρήσης. Τα μαξιλάρια είναι απο λάστιχο, της πλάτης απο πούπουλο, το ύφασμα είναι αποσπώμενο και η inox βάση του μπορεί να κατασκευαστεί απο ξύλο οξυάς σε διάφορους χρωματισμούς. Οι διαστάσεις της είναι:305x250x98. Διατίθεται όμως σε διάφορες διαστάσεις όμως και ως τριθέσιος και διθέσιος καναπές."],

    ["title" => "Barcelona", "sku" => "Barcelona", "stock"=> 10, "short_desc"=> "Εντυπωσιακή γωνία με ιδιαίτερα χαρακτηριστικά τις ραφές(τύπου Νταμούς)και την χρήση ψευδοκαπιτονέ σε πλάτες,καθίσματα,μπράτσα. Οι διαστάσεις της είναι 300x240. Διατίθεται και ως τριθέσιος και ως διθέσιος καναπές."],

    ["title" => "Ιφιγένεια", "sku" => "Ιφιγένεια", "stock"=> 10, "short_desc"=> "Γωνία λιτής γραμμής κατασκευασμένη απο σκελετά οξυάς συνδυασμένα με άριστης ποιότητας καλουπωτά λάστιχα στα καθίσματα και πούπουλο με comforell στις πλάτες. Τα υφάσματα είναι αποσπώμενα και επιλογής του πελάτη. Οι διαστάσεις στην φωτογραφία είναι: 300x300x100"],

    ["title" => "Ίρις", "sku" => "Ίρις", "stock"=> 10, "short_desc"=> "Γωνία σε μοντέρνα γραμμή με λεπτομέρειες ξύλινες σε όλη την πλάτη της. Κατασκευασμένη απο σκελετά οξυάς σε συνδυασμό με καλουπωτά λάστιχα στις πλάτες και στα καθίσματα. Το ύφασμα είναι επιλογής του πελάτη μέσα απο μια μεγάλη γκάμα δειγματολογιών. Οι συγκεκριμένες διαστάσεις είναι: 406x368x100, παράγεται όμως και σε όποια διάσταση θέλετε."],

    ["title" => "Ερατώ", "sku" => "Ερατώ", "stock"=> 10, "short_desc"=> "Γωνία μοντέρνας αισθητικής με λεπτομέρειες απο inox στη βάση της.Κατασκευασμένη από σκελετά οξυάς συνδιασμένη με άριστης ποιότητας καλουπωτά λάστιχα στα καθίσματα και πούπουλο με comforell στις πλάτες. Τα υφάσματα είναι αποσπώμενα και επιλογής του πελάτη όπως και οι διαστάσεις της. Οι συγκεκριμένες διαστάσεις είναι: 280x300x100"],

    ["title" => "Oasis", "sku" => "Oasis", "stock"=> 10, "short_desc"=> "Ιδιαίτερη γωνία καινοτομικού design με χαρακτηριστικά τα κυψελοειδή latex σε πλάτη και κάθισμα και τις inox βάσεις της. Οι διαστάσεις είναι: 305x215 με δυνατότητα αυξομείωσης αυτών ανα 30cm. Διατίθεται και ως τριθέσιος ή διθέσιος καναπές"],

    ["title" => "Galla", "sku" => "Galla", "stock"=> 10, "short_desc"=> "Γωνία με καμπύλες σε όλη την επιφάνειά της και καμπαράδες που τονίζουν τον σχεδιασμό της. Κατασκευασμένη απο άριστης ποιότητας σκελετά οξυάς και καλουπωτά λάστιχα στα καθίσματά της. Τα υφάσματα είναι επιλογής του πελάτη. Τριθέσιος 322x190x104 με δυνατότητα τροποποίησης"],

    ["title" => "Havana", "sku" => "Havana", "stock"=> 10, "short_desc"=> "Nεοκλασσικη γωνία με κυρίαρχες καμπύλες γραμμές περιφερειακά,ιδιαίτερα τονισμένες με τη χρήση καμπαράδων (trucks).Λάστιχα καλουπωτά και στα καθίσματα και στις πλάτες προσδίδουν άνεση και αντοχή.Οι παραγωγικές διαστάσεις είναι 300Χ210Χ100 και 250Χ210Χ100 με δυνατότητα τροποποίησης.Τα δέρματα,δερματίνες ή υφάσματα είναι της επιλογής σας."],

    ["title" => "Shic", "sku" => "Shic", "stock"=> 10, "short_desc"=> "Σαλόνι γωνία σε νεοκλασικές καμπύλες φόρμες με καπιτονέ τεχνοτροπία στην πλάτη αλλά και στα καθίσματα του. Δίνεται δυνατότητα επιλογής των υφασμάτων μέσα απο μεγάλη γκάμα. Κατασκευασμένο απο σκελετά οξυάς συνδυασμένα με πούπουλο στα καθίσματα. Οι διαστάσεις είναι: 325x215x105 και παράγεται και σε τριθέσιο και σε διθέσιο καναπέ"],

    ["title" => "Soho", "sku" => "Soho", "stock"=> 10, "short_desc"=> "Σαλόνι γωνία σε μοντέρνα γραμμή με inox λεπτομέρειες στη βάση του. Κατασκευασμένη εξολοκλήρου από αρίστης ποιότητας σκελετά οξυάς συνδυασμένα με λάστιχα καλουπωτά στα καθίσματα και πούπουλο στην πλάτη. Το ύφασμα είναι φορετό και επιλογής του πελάτη. Οι διαστάσεις της είναι 300x206x97 με δυνατότητα προσαρμογής."]

);

function insertProductTest($data){
    /* If there is no title & no SKU -> Stop */
    if (!isset($data['title']) || empty($data['title']) || !isset($data['sku']) || empty($data['sku'])) {
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
        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_sku', $data['sku']);

        echo "Product with ID:" . $post_id . " and SKU:". $data['sku'] ." added! <br/>";

    } else {
        echo "Sku allready exists!";
    }
    return true;
}

/* Allow only this link to run the script and loop */
if ($_SERVER['REQUEST_URI'] == "/kokkoris/prod") {
    foreach ($products as $data) {
        //insertProductTest($data);
        //var_dump($data);
    }
    echo "All done!";
    die();
}
