<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Employee extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'birthdate',
        'address',
        'gender',
        'remark',
        'position_id',
        'schedule_id',
        'rate_per_hour',
        'salary',
        'is_active',
    ];

    protected $hidden = [
        'avatarMedia',
    ];

    protected $appends = ['media_url','created_on','total_working_hour','gross_amount'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName()
    {
        return 'employee_id';
    }

    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucwords($value);
    }

    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucwords($value);
    }

    protected static function boot()
    {
    	parent::boot();
    	static::creating(function($employee){
    		$employee->employee_id = strtoupper(uniqid("EMP"));
    	});
    }

    public function registerMediaCollections(){
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                $this->addMediaConversion('thumb')
                ->format('png')
                ->width(128)
                ->height(128);
            });
    }

    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }

    public function schedule(){
        return $this->hasOne(Schedule::class,'id','schedule_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class,'employee_id','id');
    }

    public function overtimes(){
        return $this->hasMany(Overtime::class,'employee_id','id');
    }

    public function cashAdvances(){
        return $this->hasMany(CashAdvance::class,'employee_id','id');
    }

    public function getTotalWorkingHourAttribute(){
        return $this->attendances->sum('num_hour');
    }

    public function getGrossAmountAttribute(){
        // Basic salary calculation
        $basicSalary = ($this->attendances->sum('num_hour') * $this->attributes['rate_per_hour'])/60;
        
        // Overtime calculation with different rates
        $overtimeAmount = 0;
        foreach($this->overtimes as $overtime) {
            // Regular overtime (1.25x)
            if($overtime->type == 'regular') {
                $overtimeAmount += ($overtime->hour * $this->attributes['rate_per_hour'] * 1.25)/60;
            }
            // Holiday overtime (2x)
            else if($overtime->type == 'holiday') {
                $overtimeAmount += ($overtime->hour * $this->attributes['rate_per_hour'] * 2)/60;
            }
            // Night differential (1.1x)
            else if($overtime->type == 'night') {
                $overtimeAmount += ($overtime->hour * $this->attributes['rate_per_hour'] * 1.1)/60;
            }
        }

        // Add other allowances if any
        $allowances = 0; // This can be expanded based on your needs
        
        return $basicSalary + $overtimeAmount + $allowances;
    }

    public function getDeductionsAttribute() {
        $grossPay = $this->gross_amount;
        
        // SSS Contribution (based on salary bracket)
        $sss = $this->calculateSSS($grossPay);
        
        // PhilHealth Contribution (2.75% of monthly salary)
        $philhealth = $grossPay * 0.0275;
        
        // Pag-IBIG Contribution (2% of monthly salary)
        $pagibig = $grossPay * 0.02;
        
        // Tax calculation (simplified)
        $tax = $this->calculateTax($grossPay);
        
        // Other deductions
        $otherDeductions = $this->cashAdvances->sum('rate_amount');
        
        return $sss + $philhealth + $pagibig + $tax + $otherDeductions;
    }

    public function calculateSSS($grossPay) {
        // Simplified SSS calculation - you should implement the actual SSS table
        if($grossPay <= 3250) return 135.00;
        else if($grossPay <= 3750) return 157.50;
        else if($grossPay <= 4250) return 180.00;
        else if($grossPay <= 4750) return 202.50;
        else if($grossPay <= 5250) return 225.00;
        else if($grossPay <= 5750) return 247.50;
        else if($grossPay <= 6250) return 270.00;
        else if($grossPay <= 6750) return 292.50;
        else if($grossPay <= 7250) return 315.00;
        else if($grossPay <= 7750) return 337.50;
        else if($grossPay <= 8250) return 360.00;
        else if($grossPay <= 8750) return 382.50;
        else if($grossPay <= 9250) return 405.00;
        else if($grossPay <= 9750) return 427.50;
        else if($grossPay <= 10250) return 450.00;
        else if($grossPay <= 10750) return 472.50;
        else if($grossPay <= 11250) return 495.00;
        else if($grossPay <= 11750) return 517.50;
        else if($grossPay <= 12250) return 540.00;
        else if($grossPay <= 12750) return 562.50;
        else if($grossPay <= 13250) return 585.00;
        else if($grossPay <= 13750) return 607.50;
        else if($grossPay <= 14250) return 630.00;
        else if($grossPay <= 14750) return 652.50;
        else if($grossPay <= 15250) return 675.00;
        else if($grossPay <= 15750) return 697.50;
        else if($grossPay <= 16250) return 720.00;
        else if($grossPay <= 16750) return 742.50;
        else if($grossPay <= 17250) return 765.00;
        else if($grossPay <= 17750) return 787.50;
        else if($grossPay <= 18250) return 810.00;
        else if($grossPay <= 18750) return 832.50;
        else if($grossPay <= 19250) return 855.00;
        else if($grossPay <= 19750) return 877.50;
        else if($grossPay <= 20250) return 900.00;
        else if($grossPay <= 20750) return 922.50;
        else if($grossPay <= 21250) return 945.00;
        else if($grossPay <= 21750) return 967.50;
        else if($grossPay <= 22250) return 990.00;
        else if($grossPay <= 22750) return 1012.50;
        else if($grossPay <= 23250) return 1035.00;
        else if($grossPay <= 23750) return 1057.50;
        else if($grossPay <= 24250) return 1080.00;
        else if($grossPay <= 24750) return 1102.50;
        else return 1125.00;
    }

    public function calculateTax($grossPay) {
        // Simplified tax calculation - you should implement the actual tax table
        if($grossPay <= 250000) return 0;
        else if($grossPay <= 400000) return ($grossPay - 250000) * 0.20;
        else if($grossPay <= 800000) return ($grossPay - 400000) * 0.25 + 30000;
        else if($grossPay <= 2000000) return ($grossPay - 800000) * 0.30 + 130000;
        else if($grossPay <= 8000000) return ($grossPay - 2000000) * 0.32 + 490000;
        else return ($grossPay - 8000000) * 0.35 + 2410000;
    }

    public function getNetPayAttribute() {
        return $this->gross_amount - $this->deductions;
    }

    protected function avatarMedia(){
        return $this->hasOne(Media::class,'id','media_id');
    }

    public function getMediaUrlAttribute(){
        $avatar = strtolower($this->attributes['gender'].'.png');
        $url = [
            'original' => url('admin_assets/avatars/employee/'.$avatar),
            'thumb' => url('admin_assets/avatars/employee/thumb/'.$avatar),
        ];  
        if(!is_null($this->attributes['media_id']) && !is_null($this->avatarMedia)){
            $imgurl = $this->avatarMedia->getFullUrl();
            // $imgHeaders = @get_headers( str_replace(" ", "%20", $imgurl) )[0];
            // if(file_exists($this->avatarMedia->getPath()) && ($imgHeaders != 'HTTP/1.1 404 Not Found')){
                $url = [
                    'original' => $this->avatarMedia->getFullUrl(),
                    'thumb' => $this->avatarMedia->getFullUrl('thumb'),
                ];
            // }
        }
        return $url;
    }

    public function getCreatedOnAttribute(){
        $dt = $this->attributes['created_at'];
        $date = date('M d, Y', strtotime($dt));
        return $date;
    }
}
