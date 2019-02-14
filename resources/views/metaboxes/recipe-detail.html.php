<table class="form-table">
  <tr>
    <th><?php _e("Temps de préparation"); ?> <?php echo $time; ?></th>
    <td>
      <select name="rat_time_preparation" id="rat_time_preparation">
        <option value="">--</option>
        <option value="10-15" <?php echo ($time == "10-15") ? "selected" : ""; ?>>
          de 10 à 15min
        </option>
        <option value="15-30" <?php echo ($time == "15-30") ? "selected" : ""; ?>>
          de 15 à 30min
        </option>
        <option value="30-45" <?php echo ($time == "30-45") ? "selected" : ""; ?>>
          de 30 à 45min
        </option>
      </select>
    </td>
  </tr>
</table>