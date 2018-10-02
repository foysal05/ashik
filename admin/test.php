 <select class="form-control" required="" name="genre">
    <option value="">Select Genre</option>
    <option value="Biography" <?php  if(isset($genre=='Biography' )){echo "selected"; }?>>Biography</option>
    <option value="Crime" <?php  if(isset($genre=='Crime' )){echo "selected"; }?>>Crime</option>
    <option value="Family" <?php  if(isset($genre=='Family' )){echo "selected"; }?>>Family</option>
    <option value="Horror" <?php  if(isset($genre=='Horror' )){echo "selected"; }?>>Horror</option>
    <option value="Romance" <?php  if(isset($genre=='Romance' )){echo "selected"; }?>>Romance</option>
    <option value="Sports" <?php  if(isset($genre=='Sports' )){echo "selected"; }?>>Sports</option>
    <option value="War" <?php  if(isset($genre=='War' )){echo "selected"; }?>>War</option>
    <option value="Adventure" <?php  if(isset($genre=='Adventure' )){echo "selected"; }?>>Adventure</option>
    <option value="Comedy" <?php  if(isset($genre=='Comedy' )){echo "selected"; }?>>Comedy</option>
    <option value="Documentary" <?php  if(isset($genre=='Documentary' )){echo "selected"; }?>>Documentary</option>
    <option value="Fantasy" <?php  if(isset($genre=='Fantasy' )){echo "selected"; }?>>Fantasy</option>
    <option value="Thriller" <?php  if(isset($genre=='Thriller' )){echo "selected"; }?>>Thriller</option>
</select>