<?php

class FillDataList
{
    public function fill(array $data):void
    {
        ?>
        <datalist id="questionId">
            <?php
            foreach ($data as $questionId)
            {
                ?><option value="<?php echo $questionId ?>"><?php
            }
            ?>
        </datalist>
        <?php
    }
}
