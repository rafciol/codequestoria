<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_codequestoria');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['languages'])) {
    $languages = $_POST['languages'];
    $language_list = implode(",", array_map('intval', $languages));

    $sql = "SELECT * FROM assign WHERE ID_prog_language IN ($language_list)";
    $result = mysqli_query($conn, $sql);

    $questions = [];
    if (mysqli_num_rows($result) > 0) {
        while ($fetch = mysqli_fetch_array($result)) {
            $questions[] = [
                'assign_title' => $fetch['assign_title'],
                'assign_img_url' => $fetch['assign_img_url'],
                'optA' => $fetch['optA'],
                'optB' => $fetch['optB'],
                'optC' => $fetch['optC'],
                'optD' => $fetch['optD'],
                'correctOpt' => $fetch['correctOpt']
            ];
        }
        echo json_encode(['success' => true, 'questions' => $questions]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No questions found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No languages selected']);
}

?>