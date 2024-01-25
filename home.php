<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>

  <link rel="stylesheet" href="boxes.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <body>
<div class="section">
             <div class="services">
             <a href="" class="button">
                <div class="card">
                    <div class="icon">
                    <i class="fa-solid fa-chart-line"></i>                   
                    </div>
                    <h2>Dashboard</h2>
                </a>
                </div>
                <a href="index.php?page=ticket_list" class="button">
                <div class="card">
                    <div class="icon">
                    <i class="fa-solid fa-ticket"></i>                      
                    </div>
                    <h2>Ticket List</h2>
                    </a>
                </div>
                <a href="index.php?page=customer_list" class="button">
                <div class="card">
                    <div class="icon">
                    <i class="fa-solid fa-user-tie"></i>                     
                    </div>
                    <h2>Administrator</h2>
                    <a href="#" class="button"></a>
                </div>
             </div>
</div>
</body>

<?php elseif($_SESSION['login_type'] == 2): ?>

<link rel="stylesheet" href="boxes.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<body>
<div class="section">
           <div class="services">
           <a href="" class="button">
              <div class="card">
                  <div class="icon">
                  <i class="fa-solid fa-chart-line"></i>                   
                  </div>
                  <h2>Dashboard</h2>
              </a>
              </div>
              <a href="index.php?page=ticket_list" class="button">
              <div class="card">
                  <div class="icon">
                  <i class="fa-solid fa-ticket"></i>                      
                  </div>
                  <h2>Ticket List</h2>
                  </a>
              </div>
              <a href="index.php?page=customer_list" class="button">
              <div class="card">
                  <div class="icon">
                  <i class="fa-solid fa-user-tie"></i>                     
                  </div>
                  <h2>Administrator123</h2>
                  <a href="#" class="button"></a>
              </div>
           </div>
</div>
</body>

<?php else: ?>
  <link rel="stylesheet" href="userhome.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <body>
<div class="section">
    <a href="index.php?page=ticket_list" class="button">
        <div class="services">
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-chart-line"></i>                   
                </div>
                <h2>Ticket List</h2>
                </a>
            </div>
            <a href="" class="button">
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-ticket"></i>                      
                </div>
                <h2>Ticket History</h2>
                </a>
            </div>
        </div>
    </div>
</body>
<?php endif; ?>
