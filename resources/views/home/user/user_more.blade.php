@extends('home.user.layouts.master')
@section('content')
    <div class="jib_xinx_kuang">
        <div class="wt">
            <ul>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'info'])}}">个人信息</a></li>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'icon'])}}">设置头像</a></li>
                <li class="dangq_hongx"><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'more'])}}">更多个人信息</a></li>
            </ul>
        </div>
        <div class="wd">
            <div class="user_set">

                <div class="item_meic">
                    <span class="label_meic">婚姻状况：</span>
                    <div class="fl_e">
                        <input type="radio" name="sex" class="jdradio" value="0">
                        <label class="mr10">未婚</label>
                        <input type="radio" name="sex" class="jdradio" value="0">
                        <label class="mr10">已婚</label>
                        <input type="radio" name="sex" class="jdradio" value="0">
                        <label class="mr10">保密</label>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">家庭收入：</span>
                    <div class="fl_e">
                        <select class="form_select">
                            <option>请选择</option>
                            <option>5000元以下</option>
                            <option>5000-10000元</option>
                            <option>10000-15000元</option>
                            <option>15000-20000元</option>
                            <option>20000元以上</option>
                        </select>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">家庭成员数：</span>
                    <div class="fl_e">
                        <select class="form_select">
                            <option>请选择</option>
                            <option>1人</option>
                            <option>2人</option>
                            <option>3人</option>
                            <option>4人</option>
                            <option>5人</option>
                            <option>6人</option>
                        </select>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">学历：</span>
                    <div class="fl_e">
                        <select class="form_select">
                            <option>请选择</option>
                            <option>初中及以下</option>
                            <option>高中</option>
                            <option>专科</option>
                            <option>本科</option>
                            <option>研究生及以上</option>
                        </select>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">职业：</span>
                    <div class="fl_e">
                        <select class="form_select select_work">
                            <option>请选择</option>
                            <option>企业雇主/企业经营者</option>
                            <option>高级行政人员(总裁、总经理、董事等)</option>
                            <option>中层管理人员(总监、经理、主任等)</option>
                            <option>专业人士(律师、工程师、医生、教师等)</option>
                            <option>办公人员(一般文员、业务、办事员等)</option>
                            <option>工人/蓝领</option>
                            <option>公务员/事业单位员工</option>
                            <option>自由职业者</option>
                            <option>军人</option>
                            <option>学生</option>
                            <option>退休</option>
                            <option>家庭主妇</option>
                            <option>其他</option>
                        </select>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">关注的商品：</span>
                    <div class="fl_e">
                        <ul class="form-ul" id="dddv">
                            <li>电视/影音</li>
                            <li>冰箱/洗衣机/空调</li>
                            <li>美食/美景/周边游</li>
                            <li>丽人</li>
                            <li>酒店</li>
                            <li>医疗</li>
                            <li>培训学校</li>
                            <li>娱乐/棋牌</li>
                            <li>中医养生</li>
                            <li>酒吧/KTV</li>
                        </ul>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic"></span>
                    <div class="fl_e">
                        <input type="button" value="保存" class="savebtn">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
