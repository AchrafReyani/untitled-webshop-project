 <?php 
//print every menu label
function showMenuItem($link, $label) { 
  echo '<li><a href=\index.php?page='. $link .'>' . $label . '</a></li>' . PHP_EOL; 
} 

function showMenu($data) {  
  echo '<nav> 
  <ul class="menu">'; 
  foreach($data['menu'] as $link => $label) { 
    showMenuItem($link, $label); 
  }
  echo '</ul>' . PHP_EOL . '         </nav>' . PHP_EOL;  
}
?>


