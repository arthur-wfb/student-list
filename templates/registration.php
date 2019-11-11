<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo col-md-12"><a href="../"><h3>Student list</h3></a></div>
            <div class='col-md-6 offset-md-3'>
                <form action="../register.php" method="POST">
                    <?php if ($message): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php endif ?>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name='name' class="form-control" placeholder="Enter your name" value="<?= $student['name'] ?>" required >
                    </div>  
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name='surname' class="form-control" placeholder="Enter your surname" value="<?= $student['surname'] ?>" required >
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Group number</label>
                        <input type="number" name='groupNum' class="form-control" placeholder="Enter group number" value="<?= $student['groupNum'] ?>" required >
                    </div>  
                    <div class="form-group">
                        <label>Exam points</label>
                        <input type="number" name='points' class="form-control" placeholder="Enter your exam points" value="<?= $student['points'] ?>" required >
                    </div> 
                    <input type="submit" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>