<?php if($the_action == 'report'): ?>	
			<table class="zebra">
				<tr>
					<th>Usuario</th>
                    <th>Juego</th>
                    <th>Score</th>
                    <th>Tiempo (seg)</th>
                    <th>Veces&nbsp;jugadas</th>
				</tr>
				<?php foreach($data as $row) { ?>
                <tr>
					<td><?=$row['username']?></td>
					<td><?=$row['game']?></td>
                    <td><?=$row['tot_score']?></td>
                    <td><?=$row['tot_time']?></td>
                    <td><?=$row['num_games']?></td>
				</tr>
                <?php } ?>
			</table>	
	
<?php else: ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#reporte").click(function() {
		$('#filters_player').attr('action', 'reports/player/report');
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});

	$("#user_asc").click(function(){
		$('#order_by').val("username ASC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#user_desc").click(function(){
		$('#order_by').val("username DESC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#game_asc").click(function(){
		$('#order_by').val("game ASC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#game_desc").click(function(){
		$('#order_by').val("game DESC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#score_asc").click(function(){
		$('#order_by').val("tot_score ASC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#score_desc").click(function(){
		$('#order_by').val("tot_score DESC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#time_asc").click(function(){
		$('#order_by').val("tot_time ASC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#time_desc").click(function(){
		$('#order_by').val("tot_time DESC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#times_asc").click(function(){
		$('#order_by').val("num_games ASC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	$("#times_desc").click(function(){
		$('#order_by').val("num_games DESC");
		$('#filters_player').submit();
		$('#filters_player').attr('action', '');
	});
	
});
</script>
	<div class="overview">
		<p class="welcome">
			<?=__('Reporte Jugadores')?> <br />
            <form name="filters_player" id="filters_player" method="get">
	            <input type="hidden" name="csrf_token" value="<?=Security::token()?>" />
            	<div class="filter">
                    <label>Texto libre</label>
                    <input type="text" name="free_text" value="<?=$params['free_text']?>" />
                </div>
            	<div class="filter">
                    <label>Estado</label>
                    <select name="state_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($states as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['state_id']) { echo "selected"; } ?>><?=$row['name']?></option>
                        <?php endforeach; ?> 
                    </select>
                </div>
            	<div class="filter date">
                    <label>Rango fechas</label>
                    <input type="text" name="date_start" class="date" value="<?=$params['date_start']?>" />
                    <input type="text" name="date_end" class="space date" value="<?=$params['date_end']?>" />
                </div>
            	<div class="filter">
                    <label>Desarrollador</label>
                    <select name="developer_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($developers as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['developer_id']) { echo "selected"; } ?>><?=$row['title']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            	<div class="filter">
                    <label>Juego</label>
                    <select name="game_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($games as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['game_id']) { echo "selected"; } ?>><?=$row['title']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            	<div class="filter">
                    <label>Grado escolar</label>
                    <select name="school_year_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($school_years as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['school_year_id']) { echo "selected"; } ?>><?=$row['school_year']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            	<div class="filter">
                    <label>Materia</label>
                    <select name="asignature_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($asignatures as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['asignature_id']) { echo "selected"; } ?>><?=$row['asignature']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            	<div class="filter">
                    <label>Actividad favorita</label>
                    <select name="activity_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($activities as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['activity_id']) { echo "selected"; } ?>><?=$row['activity']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            	<div class="filter">
                    <label>Como te enteraste</label>
                    <select name="how_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($how_id as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['how_id']) { echo "selected"; } ?>><?=$row['how']?></option>
                        <?php endforeach; ?> 
                    </select>
                </div>
            	<div class="filter">
                    <label>Género</label>
                    <select name="gender">
                        <option value="">- Seleccione -</option>
                        <option value="1" <?php if($params['gender']==1) { echo "selected"; } ?>>niño</option>
                        <option value="2" <?php if($params['gender']==2) { echo "selected"; } ?>>niña</option>
                        <option value="3" <?php if($params['gender']==3) { echo "selected"; } ?>>adulto</option>
                    </select>
                </div>
                            	<div class="filter">
                    <label>Campaña</label>
                    <select name="how_id">
                        <option value="">- Seleccione -</option>
                        <?php foreach($source_id as $row): ?>
                        <option value="<?=$row['id']?>" <?php if($row['id']==$params['source_id']) { echo "selected"; } ?>><?=$row['source']?></option>
                        <?php endforeach; ?> 
                    </select>
                </div>
                <div class="filter">
                	<input type="submit" value="Buscar" class="submit"></button>
                </div>    
					<input type="hidden" name="order_by" id="order_by" value="" />
            </form>
			 <div class="filter"><input type="button" id="reporte" name="reporte" value="Exportar reporte" class="submit"></div>
		</p>
        <p style="width: 100%; height: 20px;float: left;">&nbsp;</p>
		<div style="float: left; width: 900px;">
			<table class="zebra">
				<tr>
				
					<th>Usuario<img align="right" src="../assets/images/backend/bullet_arrow_down.png" id="user_desc" /><img id="user_asc" align="right" src="../assets/images/backend/bullet_arrow_up.png" /></th>
                    <th>Juego<img align="right" src="../assets/images/backend/bullet_arrow_down.png" id="game_desc" /><img align="right" src="../assets/images/backend/bullet_arrow_up.png"  id="game_asc" /></th>
                    <th style="text-align:right;">Score<img align="right" src="../assets/images/backend/bullet_arrow_down.png" id="score_desc" /><img align="right" src="../assets/images/backend/bullet_arrow_up.png" id="score_asc" /></th>
                    <th  style="text-align:right;">Tiempo (seg)<img align="right" src="../assets/images/backend/bullet_arrow_down.png" id="time_desc" /><img align="right" src="../assets/images/backend/bullet_arrow_up.png" id="time_asc" /></th>
                    <th  style="text-align:right;">Veces&nbsp;jugadas<img align="right" src="../assets/images/backend/bullet_arrow_down.png" id="times_desc" /><img align="right" src="../assets/images/backend/bullet_arrow_up.png" id="times_asc" /></th>
				</tr>
				<?php foreach($data as $row) { ?>
                <tr>
					<td><?=$row['username']?></td>
					<td><?=$row['game']?></td>
                    <td  style="text-align: center"><?=$row['tot_score']?></td>
                    <td style="text-align: center"><?=$row['tot_time']?></td>
                    <td style="text-align: center"><?=$row['num_games']?></td>
				</tr>
                <?php } ?>
			</table>
		</div>
	</div>
<?php endif; ?>