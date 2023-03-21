            </table>
          </div>
        </div>
            <?php
                    if (isset($_SESSION['user_access_privileges']) 
                        && $_SESSION['user_access_privileges'] == 'admin'):
            ?>
        <hr/>
        <p class='nav-link'>If you would like to change any of the details 
        of this movie feel free to 
           <a href='editmovie.php?id_to_edit=<?= $row['id'] ?>'> edit it</a></p>
            <?php 
                    endif;
                else:
            ?>
        <h3>No Movie Details :-(</h3>
        <?php
                endif;
            else:
        ?>
        <h3>No Movie Details :-(</h3>
        <?php
            endif;
        ?>
      </div>
    </div>
    <script ...></script>