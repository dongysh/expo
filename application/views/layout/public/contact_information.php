<div>
    <p class="business_account_title">
        <?= _('Enter your Contact Information') ?>
    </p>

    <div>
        <div class="join_input_title">
            <span class="fcred">&nbsp;*&nbsp;</span>
            <?= _('Name') ?>:
        </div>
        <div class="join_input">
            <input id="first_name" type="text" name="first_name"/>
            &nbsp;&nbsp;
            <input id="last_name" type="text" name="last_name"/>
            <br/>
            <span class="alert"><?= _('First Name') ?></span>
            &nbsp;&nbsp;
            <span class="alert"><?= _('Last Name') ?></span>
        </div>
        <div class="join_input_error">
            <span id="name_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred"></span>
            <?= _('Gender') ?>:
        </div>
        <div class="join_input">
            <input id="male" type="radio" checked="checked" name="sex" value="1"/><label
                for="male"><?= _('Male') ?></label>
            <input id="female" type="radio" name="sex" value="0"/><label for="female"><?= _('Female') ?></label>
        </div>
        <div class="join_input_error">
            <span id="sex_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">&nbsp;*&nbsp;</span>
            <?= _('Company Name') ?>:
        </div>
        <div class="join_input">
            <input id="company_name" type="text" name="company_name"/>
        </div>
        <div class="join_input_error">
            <span id="company_name_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">&nbsp;*&nbsp;</span>
            <?= _('Location') ?>:
        </div>
        <div class="join_input">
            <select id="personal_location_id" name="personal_location_id">
                <option value="0">---- Select Company Location ----</option>
                <? foreach ($recommend_location->result() as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
                <? endforeach; ?>
                <optgroup label="--------------------------------------"></optgroup>
                <? foreach ($location_result->result() as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="join_input_error">
            <span id="personal_location_id_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred"></span>
            <?= _('Tel') ?>:
        </div>
        <div class="join_input">
            <input id="tel1" type="text" name="tel1"/>
            &nbsp;-&nbsp;
            <input id="tel2" type="text" name="tel2"/>
            &nbsp;-&nbsp;
            <input id="tel3" type="text" name="tel3"/>
            &nbsp;-&nbsp;
            <input id="tel4" type="text" name="tel4"/>
            <br/>
            <span class="tel_alert"><?= _('Country') ?></span>
            &nbsp;-&nbsp;
            <span class="tel_alert"><?= _('Area') ?></span>
            &nbsp;-&nbsp;
            <span class="tel_alert"><?= _('Number') ?></span>
            &nbsp;-&nbsp;
            <span class="tel_alert"><?= _('Ext.') ?></span>
        </div>
        <div class="join_input_error">
            <span id="tel_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title">
            <span class="fcred">&nbsp;*&nbsp;</span>
            <?= _('Enter the code shown') ?>:
        </div>
        <div class="join_input">
            <input id="code" type="text" name="code"/>

            <div class="code_img"><?= $code['img'] ?></div>
            <div class="code_img_change">
                <a href="#"><?= _('Load new image') ?></a>
            </div>
        </div>
        <div class="join_input_error">
            <span id="code_error" class="error"></span>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title"></div>
        <div class="join_input cerms">
            As a member of global-expo.cn, I agree to the <a href="<?= base_url() ?>terms-of-use.html" target="_blank">Terms
                of Use</a>
        </div>
        <div class="join_input_error"></div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="join_input_title"></div>
        <div class="join_input">
            <input id="submit" type="submit" name="reg" value=" "/>
            <span class="fcred"></span>

            <div class="img">
                <img     <? img_src('loading.gif') ?> width="24" height="24"/><span>checking......</span>
            </div>
        </div>
        <div class="join_input_error"></div>
        <div class="clear"></div>
    </div>
</div>