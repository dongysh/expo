<div>
    <p class="business_account_title">
        <?= _('Create your Business Account') ?>
    </p>

    <div>
        <div class="join_input_title">
            <span class="fcred">*&nbsp;</span>
            <?= _('Email') ?>:
        </div>
        <div class="join_input">
            <input id="login_name" type="text" name="login_name"/>
        </div>
        <div class="join_input_error">
            <span id="login_name_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">*&nbsp;</span>
            <?= _('Password')   ?>:
        </div>
        <div class="join_input">
            <input id="password" type="password" name="password"/>
        </div>
        <div class="join_input_error">
            <span id="password_error" class="error"><span class="fcb2">6-20 characters (a-z,0-9only)</span></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">*&nbsp;</span>
            <?= _('Confirm Password') ?>:
        </div>
        <div class="join_input">
            <input id="confirm" type="password" name="confirm"/>
        </div>
        <div class="join_input_error">
            <span id="confirm_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">&nbsp;*&nbsp;</span>
            <?= _('Industry') ?>:
        </div>
        <div class="join_input">
            <select id="personal_industry_id" name="personal_industry_id">
                <option value="0">---- Select Business Industry ----</option>
                <? foreach ($industry_result->result() as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="join_input_error">
            <span id="personal_industry_id_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
</div>