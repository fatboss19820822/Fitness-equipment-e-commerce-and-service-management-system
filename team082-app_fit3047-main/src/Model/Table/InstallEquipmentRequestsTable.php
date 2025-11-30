<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstallEquipmentRequests Model
 *
 * @method \App\Model\Entity\InstallEquipmentRequest newEmptyEntity()
 * @method \App\Model\Entity\InstallEquipmentRequest newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InstallEquipmentRequest> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstallEquipmentRequest get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InstallEquipmentRequest findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InstallEquipmentRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InstallEquipmentRequest> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstallEquipmentRequest|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InstallEquipmentRequest saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InstallEquipmentRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InstallEquipmentRequest>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InstallEquipmentRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InstallEquipmentRequest> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InstallEquipmentRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InstallEquipmentRequest>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InstallEquipmentRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InstallEquipmentRequest> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstallEquipmentRequestsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('install_equipment_requests');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->allowEmptyString('company_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('brand_name')
            ->maxLength('brand_name', 255)
            ->requirePresence('brand_name', 'create')
            ->notEmptyString('brand_name');

        $validator
            ->scalar('equipment_category')
            ->requirePresence('equipment_category', 'create')
            ->notEmptyString('equipment_category');

        $validator
            ->scalar('equipment_type')
            ->maxLength('equipment_type', 255)
            ->requirePresence('equipment_type', 'create')
            ->notEmptyString('equipment_type');

        $validator
            ->dateTime('preferred_datetime')
            ->requirePresence('preferred_datetime', 'create')
            ->notEmptyDateTime('preferred_datetime');

        return $validator;
    }
}
