<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Students list</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="studentList col-md-12">
            <div class="header">
                <div class="row">
                    <div class="logo col-md-2 align-self-start"> <a href="../"><h3>Student list</h3></a> </div>
                    <div class="seachForm col-md-3 offset-md-4 align-self-end">
                        <form method="get">
                            <div class="row">
                            <input name="search" type="text" class="form-control col-md-8" required >
                            <input type="submit" value='Search' class="btn btn-primary col-md-4"> 
                            </div>
                            
                        </form>
                    </div>
                    <a href="register.php" class='profile seachForm col-md-1 offset-md-1 align-self-end btn btn-primary'>
                        <?php if ($student): ?>
                        Edit
                        <?php else: ?>
                        Register
                        <?php endif ?>
                    </a>
                </div>
            </div>
            
            <table class = 'table col-md-12'>
                <thead>
                    <tr>
                        <th scope = 'col'><a href=" <?php $linker->createLink('sort', 'name');  ?> ">Student name</a></th>
                        <th scope = 'col'><a href=" <?php $linker->createLink('sort', 'surname');  ?> ">Surname</a></th>
                        <th scope = 'col'><a href=" <?php $linker->createLink('sort', 'groupNum');  ?> ">Group Number</a></th>
                        <th scope = 'col'><a href=" <?php $linker->createLink('sort', 'points');  ?> ">Exam points</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($students): foreach($students as $student): ?>
                    <tr>
                        <?php foreach($student as $value): ?>
                        <td><?= $value ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?php if ($page > 2): ?> 
                    <a class='pageButton btn btn-primary' href='<?= $linker->createLink('page', 1); ?>'> < </a> 
                <?php endif ?> 
                <?php if ($page - 1 > 0): ?> 
                    <a class='pageButton btn btn-primary' href='<?= $linker->createLink('page', $page - 1); ?>'> <?= $page - 1 ?> </a> 
                <?php endif ?>
                <a class='pageButton btn btn-primary' href='<?= $linker->createLink('page', $page);?> '> <?= $page ?> </a>
                <?php if ($page + 1 <= $pagesAmount): ?> 
                    <a class='pageButton btn btn-primary' href='<?= $linker->createLink('page', $page + 1); ?>'> <?= $page + 1 ?> </a> 
                <?php endif ?>
                <?php if ($page < $pagesAmount - 1): ?> 
                    <a class='pageButton btn btn-primary' href='<?= $linker->createLink('page', $pagesAmount); ?>'> > </a> 
                <?php endif ?> 
            </div>
            
        </div>
        
    </div>

</div>

</body>
</html>