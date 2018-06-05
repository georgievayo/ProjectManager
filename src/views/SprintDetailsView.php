<!DOCTYPE HTML>
<html>
	<head>
		<title>Project Manager - Sprint Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />        
	</head>
	<body>
        <div id="wrapper">
            <div id="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <span id="alert-content"></span>
            </div>
            <div id="main">
                <div class="inner">
                    <header id="header">
                        <h2>Sprint Details</h2>
                        <ul class="icons">
                            <li><a href="../controllers/Logout.php" class="icon fa-sign-out">Logout</a></li>
                        </ul>
                    </header>
                    <section class="banner">
                        <div class="content" id="sprint-details">
                            <header>
                                <h1><?=$sprint->getName()?></h1>
                                <?php 
                                if(!$sprint->getIsActive())
                                {
                                    echo '<p>This sprint is closed.</p>';
                                }
                                ?>
                            </header>
                            <p><span class="param"><i class="icon fa-calendar"></i> Start date:</span> <span class="info"><?=$sprint->getStartDate()->format('d/m/Y')?></span></p>
                            <p><span class="param"><i class="icon fa-calendar"></i> End date:</span> <span class="info"><?=$sprint->getEndDate()->format('d/m/Y')?></span></p>
                            <p><span class="param"><i class="icon fa-user"></i> Project:</span> <span class="info"><a href='./GetProject.php?project_id=<?php echo $sprint->getProject(); ?>' ><?=$sprint->getProjectTitle()?></a></span></p>                            
                            <p><?=$sprint->getGoal()?></p>
                            <div class="row">
                            <div class="6u">
                        </div>
                        <div class="6u">
                            <h4>
                                <i class="icon fa-list"></i> Tasks:
                                <a href="../views/AddTaskView.php?project_id=<?=$project_id?>" class="button special">New</a>
                            </h4>
                            
                            <ul id="tasks-list">
                                To-do/In progress/Done
                                <?php
                                foreach($tasks as $task)
                                {
                                    echo '<li><a href="./GetTask.php?id='.$task->getId().'">'.$task->getName().'</a></li>';                                  
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <?php 
                        if($sprint->getIsActive())
                        {
                            echo '<span class="button default disabled">Active</span>';
                        }

                        if($isPojectParticipant)
                        {
                            echo '<a href="./GetEditSprint.php?id='.$sprint_id.'"class="button special sprint-edit">Edit</a>';
                        }
                        ?>
                </div>

            </section>
        </div>
    </div>

    <div id="sidebar">
        <div class="inner">
                <section id="search" class="alt">
                    <h2>Project Manager</h2>
                </section>

                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="./HomePageLoggedView.php">Homepage</a></li>
                        <li><a href="generic.html">Dashboard</a></li>
                        <li><a href="./GetAllProjects.php">Projects</a></li>
                        <li>
                            <span class="opener">Sprints</span>
                            <ul>
                                <?php
                                foreach($user_active_sprints as $sprint)
                                {
                                    echo '<li><a href="./GetSprint.php?id='.$sprint->getId().'">'.$sprint->getName().'</a></li>';                                  
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <footer id="footer">
                    <p class="copyright">&copy; Project Manager. All rights reserved.</p>
                </footer>
        </div>
    </div>
</div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/skel.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/show-alerts.js"></script>
	</body>
</html>