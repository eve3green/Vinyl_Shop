<form action="" method="post">
<label for="name">Name:</label><br/>
<input type="text" name="name" value="<?php if (isset($data))foreach($data as $record) echo $record['name']; else echo isset($data['name']);?>"/>
<br/>
<label for="artist">Artist(s):</label><br/>
<input type="text" name="artist" value="<?php if (isset($data))foreach($data as $record) echo $record['artist']; else echo isset($data['artist']);?>"/>
<br/>
<label for="desc">Description:</label><br/>
<input type="text" name="desc" value="<?php if (isset($data))foreach($data as $record) echo $record['description']; else echo isset($data['description']);?>"/>
<br/>
<label for="paperback">Paperback:</label><br/>
<input type="text" name="paperback" value="<?php if (isset($data))foreach($data as $record) echo $record['paperback']; else echo isset($data['paperback']); ?>"/>
<br/>
<label for="recyear">RecordYear:</label><br/>
<input type="date" name="recyear" value="<?php if (isset($data))foreach($data as $record) echo $record['recyear']; else echo isset($data['recyear']); ?>"/>
<br/>
<label for="relyear">ReleaseYear:</label><br/>
<input type="date" name="relyear" value="<?php if (isset($data))foreach($data as $record) echo $record['relyear']; else echo isset($data['relyear']); ?>"/>
<br/>
<label for="aviability">Aviability:</label><br/>
<input type="number" name="aviability" value="<?php if (isset($data))foreach($data as $record) echo $record['aviability']; else echo isset($data['aviability']); ?>"/>
<br/>
<label for="genre">Genre:</label><br/>
<input type="text" name="genre" value="<?php if (isset($data))foreach($data as $record) echo $record['genreV']; else echo isset($data['genre']); ?>"/>
<br/>
<label for="price">Price:</label><br/>
<input type="number" step="0.01" name="price" value="<?php if (isset($data))foreach($data as $record) echo $record['price']; else echo isset($data['price']); ?>"/>
<br/>
<label for="rtype">RecordsType:</label><br/>
<input type="text" name="rtype" value="<?php if (isset($data))foreach($data as $record) echo $record['recordstypeV']; else echo isset($data['rtype']); ?>"/>
<br/>
<label for="duration">Duration,s:</label><br/>
<input type="number" name="duration" value="<?php if (isset($data))foreach($data as $record) echo $record['duration']; else echo isset($data['duration']); ?>"/>
<br/>
<input type="hidden" name="form-submitted" value="1" />
<input type="submit" value="Save" />
</form>