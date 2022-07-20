<?php
include('authentication.php');

if(isset($_POST['post_update']))
{
    $post_id = $_POST['post_id'];

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Removed all Special Character and replace with hyphen
    $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
    $slug = strtolower($final_slug);
    
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if($image != NULL)
    {
        // Rename this Image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1':'0';


    $query = "UPDATE posts SET category_id='$category_id', name='$name', slug='$slug', description='$description', image='$update_filename',
                    meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', 
                    status='$status' WHERE id='$post_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        if($image != NULL){
            if(file_exists('../uploads/posts/'.$old_filename)){
                unlink("../uploads/posts/".$old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$update_filename);
        }

        $_SESSION['message'] = "Post Updated Successfully";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }

}


if(isset($_POST['post_add']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Removed all Special Character and replace with hyphen
    $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
    $slug = strtolower($final_slug);

    $description = mysqli_real_escape_string($con, $_POST['description']);

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    if($image != NULL)
    {
        // Rename this Image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;
    }
    else
    {
        $filename = "";
    }

    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO posts (category_id,name,slug,description,image,meta_title,meta_description,meta_keyword,status) VALUES 
                ('$category_id','$name','$slug','$description','$filename','$meta_title','$meta_description','$meta_keyword','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        $_SESSION['message'] = "Post Created Successfully";
        header('Location: post-add.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: post-add.php');
        exit(0);
    }
}


if(isset($_POST['category_update']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
 
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Removed all Special Character and replace with hyphen
    $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
    $slug = strtolower($final_slug);

    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', 
                meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status', 
                status='$status' WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Updated Successfully";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }
}








if(isset($_POST['category_add']))
{
    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Removed all Special Character and replace with hyphen
    $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
    $slug = strtolower($final_slug);

    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    

    $query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keyword) VALUES 
            ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Added Successfully";
        header('Location: category-add.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: category-add.php');
        exit(0);
    }
}



?>