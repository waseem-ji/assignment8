<?php
// use Core\Validator;
$conn = dbconnect();

$title = mysqli_real_escape_string($conn,$_POST['title']) ;
$description =  mysqli_real_escape_string($conn,$_POST['description']);
$tag = mysqli_real_escape_string($conn,$_POST['tag']);
$image = $_POST['image'] ?? '' ;
$user_id = getUserId();
$tag_id = inputToTag($tag);

$input_array = array(
    'title' =>$title,
    'description'=>$description,
    'tag'=>$tag_id,
    'image'=>$image,
    'user_id'=>$user_id
);


// if(! Validator::string($_POST['title'],1,300)) {
//     $errors['body'] = "A title of less than 300 charactors is required required";
// }

// if(! Validator::string($_POST['description'],1,2000)) {
//     $errors['body'] = "A description of less than 2000 charactors is required required";
// }

// if(! Validator::string($_POST['tag'],1,105)) {
//     $errors['body'] = "A tag of less than 100 charactors is required required";
// }

// DO SOMETHING ABOUT VALIDATION FAIL


// if(!empty($errors)) {
//     return view("/",[
//         'heading' => 'Dashboard',
//         'errors' => [] 
//     ]);
// }

if ($_POST['_method']=== "UPDATE") {
    $id= $_GET['id'];
    if (isset ($_FILES['image'])) {
        formImageProccess($_FILES['image'],$id);

    
    }
    else {
        // No image is givin
        updatePost($input_array,$id);
    }
}
else {
    if( isset($_FILES['image'])) {
        $id = inputToPosts($input_array);
        formImageProccess($_FILES['image'],$id);

        
    }
    // dd($tag_id);
   
}


header("location: /dashboard");
die();

