<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ErrorLogs Model
 *
 * @method \App\Model\Entity\ErrorLog newEmptyEntity()
 * @method \App\Model\Entity\ErrorLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ErrorLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ErrorLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\ErrorLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ErrorLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ErrorLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ErrorLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ErrorLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ErrorLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ErrorLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ErrorLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ErrorLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ErrorLogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('error_logs');
        $this->setDisplayField('id');
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
            ->scalar('error_level')
            ->maxLength('error_level', 50)
            ->requirePresence('error_level', 'create')
            ->notEmptyString('error_level');

        $validator
            ->scalar('error_message')
            ->requirePresence('error_message', 'create')
            ->notEmptyString('error_message');

        return $validator;
    }
}
